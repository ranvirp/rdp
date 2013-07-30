<?php

/**
 * This is the model class for table "{{issues}}".
 *
 * The followings are the available columns in table '{{issues}}':
 * @property integer $id
 * @property integer $schemeid
 * @property integer $parentissue
 * @property integer $from
 * @property integer $to
 * @property string $title
 * @property string $description
 * @property integer $status
 * @property string $history
 * @property integer $tagid
 * @property string $attachments
 *
 * The followings are the available model relations:
 * @property Schemes $scheme
 */
class Issues extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Issues the static model class
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
		return '{{issues}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('schemeid,  from, to,description', 'required'),
			array('schemeid, parentissue, from, to, status, tagid', 'numerical', 'integerOnly'=>true),
			array('attachments', 'length', 'max'=>255),
			 array('update_time','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'update'),
        array('create_time,update_time','default',
              'value'=>new CDbExpression('NOW()'),
              'setOnEmpty'=>false,'on'=>'insert'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array(' schemeid, parentissue, from, to, description, status, history, tagid, attachments', 'safe', 'on'=>'search'),
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
			'scheme' => array(self::BELONGS_TO, 'Schemes', 'schemeid'),
			'froms'=>array(self::BELONGS_TO,'Designation','from'),
			'tos'=>array(self::BELONGS_TO,'Designation','to'),
			
			'replies'=>array(self::HAS_MANY,'Replies','content_type_id','condition'=>'replies.content_type=\'issues\'','order'=>'replies.create_time DESC'),
			'district'=>array(self::BELONGS_TO,'District','district_id'),
			'tags'=>array(self::BELONGS_TO,'Tags','tagid'),
	
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'schemeid' => 'Schemeid',
			'parentissue' => 'Parentissue',
			'from' => 'From',
			'to' => 'To',
			'description' => 'Description',
			'status' => 'Status',
			'history' => 'History',
			'tagid' => 'Tagid',
			'attachments' => 'Attachments',
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

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('schemeid',$this->schemeid);
		$criteria->compare('parentissue',$this->parentissue);
		$criteria->compare('from',$this->from);
		$criteria->compare('to',$this->to);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('history',$this->history,true);
		$criteria->compare('tagid',$this->tagid);
		$criteria->compare('attachments',$this->attachments,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	/**
	 * This is invoked before the record is saved.
	 * @return boolean whether the record should be saved.
	 */
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				$this->create_time=$this->update_time=time();
				$this->author_id=Yii::app()->user->id;
			}
			else
				$this->update_time=time();
			return true;
		}
		else
			return false;
	}

}