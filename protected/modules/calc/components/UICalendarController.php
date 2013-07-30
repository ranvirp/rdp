<?php

/**
 * Description of ${name}
 *
 * @author Serg.Kosiy <serg.kosiy@gmail.com>
 */
class UICalendarController extends UIController
{

    public $layout = 'column1';
    public $defaultAction = 'browse';
    public $calendarOptions = array(
        'editable' => true,
        'selectable' => true,
        'theme' => true,
        'firstDay' => 0, // (int) 0 - Sun, 1 - Mon
        'timeFormat' => 'H(:mm)',
        'header' => array(
            'left' => 'title',
            'center' => 'month,agendaWeek,agendaDay', //basicWeek,basicDay,
            'right' => 'today prev,next'),
        'defaultView' => 'agendaWeek',
        'buttonText' => array(
            'today' => 'today',
            'month' => 'month',
            'week' => 'week',
            'day' => 'day',
        ),
        'monthNames' => array('January', 'February', 'March', 'April', 'May', 'June', 'July',
            'August', 'September', 'October', 'November', 'December'),
        'monthNamesShort' => array('Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun',
            'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'),
        'dayNames' => array('Sunday', 'Monday', 'Tuesday', 'Wednesday',
            'Thursday', 'Friday', 'Saturday'),
        'dayNamesShort' => array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'),
        'allDayText' => 'All day',
        'axisFormat' => 'HH(:mm)',
        'slotMinutes' => 30,
        'firstHour' => 8, // first visible hour
        'minTime' => '7:30', // start day time
        'maxTime' => '21:00', // end day time
        // Cron check all events for all users
        // from now to (now + cronPeriod)
        // and send alert via e-mail or/and sms.
        // Call controller 'cal/cron' every 'cronPeriod' minutes.
        // User preference dialog hidded if value set to 0.
        'cronPeriod' => 60, // minutes
    );
    private $_adminMode = false;     // admin flag
    private $_usersList = array();
    private $imagesUrl;              // images url

    /**
     * @return array action filters
     */

    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules()
    {
        return array(
            array('allow',
                'users' => array('@'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function init()
    {
        parent::init();
        if (!empty($_GET['layout']))
            $this->layout = $_GET['layout'];
    }

    /**
     * Render event calendar page.
     */
    public function actionBrowse()
    {
        if (isset($_POST['currentUser']))
            Yii::app()->user->setState('cal_uid', $_POST['currentUser']);
        else
            Yii::app()->user->setState('cal_uid', $this->uid);

        $curUser = Yii::app()->user->getState('cal_uid');
        
        if (!in_array('events', Yii::app()->db->getSchema()->tableNames))
            $this->tableCreate();
        
        $this->registerScript();

        // select user's prefference /e-mail, mobile alert/
        $userPref = EventsUserPreference::model()->findByPk($curUser);
        if (is_null($userPref))
        {
            $userPref = new EventsUserPreference;
            $userPref->user_id = $curUser;
            $userPref->save();
        }
        // select user's preffered events
        $criteria = new CDbCriteria(array('condition' => 'user_id=' . $curUser));
        $events = EventsHelper::model()->findAll($criteria);


        $this->render('application.components.views.calendar.browse',
                array('imagesUrl' => $this->imagesUrl,
                    'userPref' => $userPref,
                    'events' => $events)
        );
    }

    public function actionCron()
    {
        if (!$this->calendarOptions['cronPeriod'])
            return;
        $timeSlot = 60 * $this->calendarOptions['cronPeriod'];
        $timeStart = time();
        $timeEnd = $timeStart + $timeSlot;
        $sql = "select a.title, b.*";
        $sql .=" from events a, events_user_preference b";
        $sql .=" where a.user_id = b.user_id and a.start between :timeStart and :timeEnd";
        $sql .=" and ((b.mobile_alert = 1) or (b.email_alert = 1))";
        $db = Yii::app()->db;
        $command = $db->createCommand($sql);
        $command->bindParam(":timeStart", $timeStart, PDO::PARAM_INT);
        $command->bindParam(":timeEnd", $timeEnd, PDO::PARAM_INT);
        $rows = $command->query()->readAll();
        foreach ($rows as $row)
        {
            if ((bool) $row['email_alert'])
                $this->sendCronMail($row['email'], $row['title']);
            if ((bool) $row['mobile_alert'])
            {
                $mobileAddr = $this->getMobileAddr($row['mobile']);
                if ($mobileAddr)
                    $this->sendCronMail($mobileAddr, $row['title']);
            }
        }
    }

    /**
     * Return events as JSON-string for AJAX call
     * @param <int> $start unix time
     * @param <int> $end   unix time
     */
    public function actionList($start = 0, $end = 0)
    {
        if ((Yii::app()->request->isAjaxRequest) and (Yii::app()->user->hasState('cal_uid')))
        {
            $criteria = new CDbCriteria(array(
                        'condition' => 'user_id=:user_id',
                        'params' => array(':user_id' => Yii::app()->user->getState('cal_uid')),
                    ));
            $criteria->addBetweenCondition('start', $start, $end);
            $events = Event::model()->findAll($criteria);
            echo CJSON::encode($events);
            Yii::app()->end();
        }
    }

    /**
     *  Update or create new event via AJAX
     */
    public function actionUpdate()
    {
        if (!Yii::app()->user->hasState('cal_uid'))
            Yii::app()->end();

        $user_id = Yii::app()->user->getState('cal_uid');
        $title = $_POST['title'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        $allDay = ($_POST['allDay'] == 'true') ? 1 : 0;
        $editable = ($_POST['editable'] == 'true') ? 1 : 0;
        $eventId = $_POST['eventId'];
        if (Yii::app()->request->isAjaxRequest)
        {
            $event = ($eventId == 0) ? new Event : Event::model()->findByPk($eventId);
            if ($title == '')
            {
                $event->delete();
                echo 0;
            } else
            {
                $event->title = $title;
                $event->user_id = $user_id;
                $event->start = $start;
                $event->end = $end;
                $event->allDay = $allDay;
                $event->editable = $editable;
                $event->save();
                echo $event->id;
                Yii::app()->end();
            }
        }
    }

    /**
     *  Move event via AJAX
     */
    public function actionMove()
    {
        if (!Yii::app()->user->hasState('cal_uid'))
            Yii::app()->end();

        $delta = $_POST['delta'];
        $allDay = ($_POST['allDay'] == 'true') ? 1 : 0;
        $eventId = $_POST['eventId'];
        if ((Yii::app()->request->isAjaxRequest) and !empty($eventId))
        {
            $event = Event::model()->findByPk($eventId);
            $event->start += $delta;
            $event->end += $delta;
            $event->allDay = $allDay;
            $event->save();
            Yii::app()->end();
        }
    }

    /**
     *  Resize event via AJAX
     */
    public function actionResize()
    {
        if (!Yii::app()->user->hasState('cal_uid'))
            Yii::app()->end();

        $delta = $_POST['delta'];
        $eventId = $_POST['eventId'];
        if ((Yii::app()->request->isAjaxRequest) and !empty($eventId))
        {
            $event = Event::model()->findByPk($eventId);
            $event->end += $delta;
            $event->save();
            Yii::app()->end();
        }
    }

    /**
     *  Add new record in the list
     */
    public function actionCreateHelper()
    {
        if (!Yii::app()->user->hasState('cal_uid'))
            Yii::app()->end();

        $user_id = Yii::app()->user->getState('cal_uid');
        $title = $_POST['title'];

        if (Yii::app()->request->isAjaxRequest)
        {
            $ev = new EventsHelper;
            $ev->title = $title;
            $ev->user_id = $user_id;
            $ev->save();
            Yii::app()->end();
        }
    }

    /**
     *  Remove record from table
     */
    public function actionRemoveHelper()
    {
        if (Yii::app()->request->isAjaxRequest)
        {
            if (!Yii::app()->user->hasState('cal_uid'))
                Yii::app()->end();

            //$user_id = $_POST['ui'];
            $user_id = Yii::app()->user->getState('cal_uid');
            $title = $_POST['title'];
            $criteria = new CDbCriteria;
            $criteria->condition = 'user_id=:user_id';
            $criteria->params = array(':user_id' => $user_id);
            $criteria->addSearchCondition('title', $title);
            $eventsHelper = EventsHelper::model()->find($criteria);
            $eventsHelper->delete();
            Yii::app()->end();
        }
    }

    /**
     *  Store preference (e-mail, mobile) for current user
     */
    public function actionUserpreference()
    {
        if (Yii::app()->request->isAjaxRequest)
        {
            if (!Yii::app()->user->hasState('cal_uid'))
                Yii::app()->end();

            $userPref = EventsUserPreference::model();
            $userPref->attributes = $_POST['EventsUserpreference'];
            $userPref->updateByPk(Yii::app()->user->getState('cal_uid'), $_POST['EventsUserpreference']);
            Yii::app()->end();
        }
    }

    public function setAdminMode($adminMode = false)
    {
        $this->_adminMode = $adminMode;
    }

    public function getAdminMode()
    {
        return $this->_adminMode;
    }

    public function setUsersList($users)
    {
        $this->_usersList = $users;
    }

    public function getUsersList()
    {
        return $this->_usersList;
    }

    private function registerScript()
    {
        $scriptUrl = Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('application.components.assets.calendar'));
        $this->cs->registerCssFile($scriptUrl . '/fullcalendar.css');
        $this->cs->registerCssFile($scriptUrl . '/eventCal.css');
        $this->cs->registerScriptFile($scriptUrl . '/fullcalendar.min.js');
        $this->cs->registerScriptFile($scriptUrl . '/eventCal.js');

        $param['baseUrl'] = Yii::app()->createUrl('cal') . '/';
        $param['newEventPromt'] = Yii::t('Calendar', 'New event:');
        $param['calendar'] = $this->translateArray($this->calendarOptions);
        $param = CJavaScript::encode($param);
        $js = "jQuery().eventCal($param);";
        $this->cs->registerScript(__CLASS__ . '#EventCal', $js);

        $this->imagesUrl = $scriptUrl . '/images';
    }

    private function tableCreate()
    {
        $db = Yii::app()->db;
        if ($db)
        {
            $transaction = $db->beginTransaction();
            if (!in_array('events', $db->getSchema()->tableNames))
            {
                $sql = "CREATE TABLE IF NOT EXISTS `events` (
                     `id` int unsigned NOT NULL auto_increment,
                     `user_id` int unsigned NOT NULL,
                     `title` varchar(1000) character set utf8 default NULL,
                     `allDay` smallint unsigned NOT NULL default 0,
                     `start` int unsigned,
                     `end` int unsigned,
                     `editable` tinyint(1) NOT NULL default 1,
                      PRIMARY KEY  (`id`)
                        ) DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;";
                $db->createCommand($sql)->execute();
            }
            if (!in_array('events_helper', $db->getSchema()->tableNames))
            {
                $sql = "CREATE TABLE IF NOT EXISTS `events_helper` (
                     `id` int unsigned NOT NULL auto_increment,
                     `user_id` int unsigned NOT NULL,
                     `title` varchar(1000) character set utf8 default NULL,
                      PRIMARY KEY  (`id`)
                        ) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
                $db->createCommand($sql)->execute();

                $sql = "INSERT INTO `events_helper`(`user_id`, `title`) VALUES (1,'test event 1');";
                $db->createCommand($sql)->execute();
                $sql = "INSERT INTO `events_helper`(`user_id`, `title`) VALUES (1,'test event 2');";
                $db->createCommand($sql)->execute();
            }

            if (!in_array('events_user_preference', $db->getSchema()->tableNames))
            {
                $sql = "CREATE TABLE IF NOT EXISTS `events_user_preference` (
                     `user_id` int unsigned NOT NULL,
                     `mobile` varchar(20) character set utf8 default NULL,
                     `mobile_alert` tinyint(1) NOT NULL default 0,
                     `email` varchar(40) character set utf8 default NULL,
                     `email_alert` tinyint(1) NOT NULL default 0,
                      PRIMARY KEY  (`user_id`)
                        ) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
                $db->createCommand($sql)->execute();
            }
            $transaction->commit();
        }
        else
            throw new CException('Database connection is not working');
    }

    private function translateArray($arr)
    {
        foreach ($arr as $key => $data)
        {
            if (is_array($data))
            {
                foreach ($data as $k => $d)
                    $data[$k] = Yii::t('Calendar', $d);
                $arr[$key] = $data;
            }
            else
                $arr[$key] = Yii::t('Calendar', $data);
        }
        return $arr;
    }

    protected function sendCronMail($addr, $body)
    {
        $from = Yii::app()->params['adminEmail'];
        $headers = "From: {$from}\r\nReply-To: {$from}";
        mail($addr, 'Calendar event', $body, $headers);
    }

    protected function getMobileAddr($mobile)
    {
        $smsGate = array(
            '097' => '@2sms.kyivstar.net',
            '050' => '@sms.umc.ua',
            '068' => '@sms.beeline.ua',
            '066' => '@sms.jeans.com.ua',
        );
        $operator = substr($mobile, 0, 3);
        if (array_key_exists($operator, $smsGate))
            return $mobile . $smsGate[$operator];
        else
            return false;
    }

}

/*
 * This is the model class for table "events".
 */

class Event extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @return Event the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'events';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'user_id' => Yii::t('CalModule.Event', 'User'),
            'title' => Yii::t('CalModule.Event', 'Title'),
            'allDay' => Yii::t('CalModule.Event', 'All Day'),
            'start' => Yii::t('CalModule.Event', 'Start'),
            'end' => Yii::t('CalModule.Event', 'End'),
            'editable' => Yii::t('CalModule.Event', 'Editable'),
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('user_id', $this->user_id, true);
        $criteria->compare('title', $this->title, true);
        $criteria->compare('allDay', $this->allDay);
        $criteria->compare('start', $this->start, true);
        $criteria->compare('end', $this->end, true);
        $criteria->compare('editable', $this->editable);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

    public function afterFind()
    {
        $this->allDay = (bool) $this->allDay;
        $this->editable = (bool) $this->editable;
    }

}

/*
 * This is the model class for table "events_user_preference".
 */

class EventsUserpreference extends CActiveRecord
{

    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    public function tableName()
    {
        return 'events_user_preference';
    }

    public function rules()
    {
        return array(
            array('user_id', 'required'),
            array('mobile_alert, email_alert', 'numerical', 'integerOnly' => true),
            array('user_id', 'length', 'max' => 10),
            array('mobile', 'length', 'max' => 20),
            array('email', 'length', 'max' => 40),
        // The following rule is used by search().
        // Please remove those attributes that should not be searched.
        //array('user_id, mobile, mobile_alert, email, email_alert', 'safe', 'on'=>'search'),
        );
    }

    public function relations()
    {
        return array(
        );
    }

    public function attributeLabels()
    {
        return array(
            'user_id' => Yii::t('Calendar', 'User'),
            'mobile' => Yii::t('Calendar', 'Mobile'),
            'mobile_alert' => Yii::t('Calendar', 'Mobile Alert'),
            'email' => Yii::t('Calendar', 'Email'),
            'email_alert' => Yii::t('Calendar', 'Email Alert'),
        );
    }

    public function afterFind()
    {
        $this->mobile_alert = (bool) $this->mobile_alert;
        $this->email_alert = (bool) $this->email_alert;
    }

}

class EventsHelper extends CActiveRecord
{

    /**
     * Returns the static model of the specified AR class.
     * @return EventsHelper the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'events_helper';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('user_id', 'required'),
            array('user_id', 'length', 'max' => 10),
            array('title', 'length', 'max' => 1000),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, user_id, title', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'user_id' => 'User',
            'title' => 'Title',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id', $this->id, true);
        $criteria->compare('user_id', $this->user_id, true);
        $criteria->compare('title', $this->title, true);

        return new CActiveDataProvider(get_class($this), array(
            'criteria' => $criteria,
        ));
    }

}