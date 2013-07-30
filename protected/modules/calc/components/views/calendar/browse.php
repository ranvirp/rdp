<?php
$this->breadcrumbs[] = Yii::t('Calendar', 'Event Calendar');
?>

<!-- Event dialog -->
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id' => 'dlg_EventCal',
    'options' => array(
        'title' => Yii::t('Calendar', 'Event detail'),
        'modal' => true,
        'autoOpen' => false,
        'hide' => 'slide',
        'show' => 'slide',
        'buttons' => array(
            array(
                'text' => Yii::t('Calendar', 'OK'),
                'click' => "js:function() { eventDialogOK(); }"
            ),
            array(
                'text' => Yii::t('Calendar', 'Cancel'),
                'click' => 'js:function() { $(this).dialog("close"); }',
            ),
    ))));
?>

<div class="form">
    <?php echo CHtml::beginForm(); ?>
    <div class="row">
        <?php
        echo CHtml::hiddenField("EventCal_id", 0);
        echo CHtml::label(Yii::t('Calendar', 'Message'), "EventCal_title");
        echo CHtml::textField("EventCal_title");
        ?>
    </div>
    <div class="row">
        <?php
        echo CHtml::label(Yii::t('Calendar', 'Start'), "EventCal_start");
        echo CHtml::dropDownList("EventCal_start", 0, array());
        ?>
    </div>
    <div class="row">
        <?php
        echo CHtml::label(Yii::t('Calendar', 'End'), "EventCal_end");
        echo CHtml::dropDownList("EventCal_end", 0, array());
        ?>
    </div>
    <div class="row">
        <?php
        echo CHtml::label(Yii::t('Calendar', 'All day'), "EventCal_allDay");
        echo CHtml::checkBox("EventCal_allDay", true);
        ?>
    </div>
    <div class="row">
        <?php
        echo CHtml::label(Yii::t('Calendar', 'Editable'), "EventCal_editable");
        echo CHtml::checkBox("EventCal_editable", true);
        ?>
    </div>

    <?php echo CHtml::endForm(); ?>
    </div>

<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>
        <!-- end Event dialog -->

        <!-- links block -->
        <div style="text-align: right">
    <?php
        echo CHtml::link(CHtml::image("$imagesUrl/list.png"), '#',
                array(
                    'onclick' => "$('#dlg_eventsHelper').dialog('open');",
                    'title' => Yii::t('Calendar', 'Events list')
                )
        );
        if ($this->calendarOptions['cronPeriod'])
        {
            echo "&nbsp;";
            echo CHtml::link(CHtml::image("$imagesUrl/pref.png"), '#',
                    array(
                        'onclick' => "$('#dlg_Userpreference').dialog('open');",
                        'title' => Yii::t('Calendar', 'Preference')
                    )
            );
            echo "&nbsp;";
        }
        if ($this->getAdminMode())
        {
            echo "&nbsp;";
            echo CHtml::link(CHtml::image("$imagesUrl/users.png"), '#',
                    array(
                        'onclick' => "$('#dlg_changeUser').dialog('open');",
                        'title' => Yii::t('Calendar', 'change user')
                    )
            );
        }
    ?>
        <br><br>
    </div>
    <!-- end links block -->

    <!-- change user form  -->
<?php
        $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
            'id' => 'dlg_changeUser',
            'options' => array(
                'title' => Yii::t('Calendar', 'change user'),
                'autoOpen' => false,
                'modal' => true,
                'buttons' => array(
                    array(
                        'text' => Yii::t('Calendar', 'OK'),
                        'click' => "js:function() {\$('#dlg_changeUser form').submit(); }"
                    ),
                    array(
                        'text' => Yii::t('Calendar', 'Cancel'),
                        'click' => 'js:function() { $(this).dialog("close"); }',
                    ),)
                )));
        echo '<br><div align="center">';
        echo CHtml::beginForm();
        echo CHtml::dropDownList(
                "currentUser",
                Yii::app()->user->getState('cal_uid'),
                $this->getUsersList()
        );
        echo CHtml::endForm();
        echo '</div>';
        $this->endWidget('zii.widgets.jui.CJuiDialog');
?>

        <!-- User preference dialog -->
<?php
        if ($this->calendarOptions['cronPeriod'])
        {
            $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
                'id' => 'dlg_Userpreference',
                'options' => array(
                    'title' => Yii::t('Calendar', Yii::t('Calendar', 'preference')),
                    'modal' => true,
                    'autoOpen' => false,
                    'buttons' => array(
                        array(
                            'text' => Yii::t('Calendar', 'OK'),
                            'click' => 'js:function() { userpreferenceOK(); }'
                        ),
                        array(
                            'text' => Yii::t('Calendar', 'Cancel'),
                            'click' => 'js:function() { $(this).dialog("close"); }'
                        ),)
                    )));

        $formUserPref = new CForm(
                array(
                    'elements' => array(
                        'user_id' => array('type' => 'hidden'),
                        'mobile_alert' => array('type' => 'checkbox'),
                        '<br>',
                        'mobile' => array('type' => 'text'),
                        '<br>',
                        'email_alert' => array('type' => 'checkbox'),
                        '<br>',
                        'email' => array('type' => 'text'),
                    ),
                ),
                $userPref);

        echo $formUserPref;
            $this->endWidget('zii.widgets.jui.CJuiDialog');
        } ?>
        <!-- end user preference dialog -->

        <!-- Event helper dialog -->
<?php
        $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
            'id' => 'dlg_eventsHelper',
            'options' => array(
                'title' => Yii::t('Calendar', 'Events list'),
                'modal' => false,
                'position' => array('right', 'top'),
                'autoOpen' => false,
                'buttons' => array(
                    array(
                        'text' => Yii::t('Calendar', 'OK'),
                        'click' => 'js:function() { $(this).dialog("close"); }'
                    ),
                    array(
                        'text' => Yii::t('Calendar', 'add new'),
                        'click' => 'js:function() { createNewEvent(); }'
                    ),
            )))
        );
        echo "<div id='event-scrooler'>";
        foreach ($events as $e)
            echo "<div class='list-event ui-widget-content ui-corner-all'>" . $e["title"] . "</div>";
        echo '</div><br>';
        echo "<input type='checkbox' id='drop-remove' />";
        echo "<label for='drop-remove'>".Yii::t('Calendar', 'remove after drop')."</label>";

        $this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<!-- end event helper dialog -->

<div id='loading' style='display:none'>loading...</div>

<div id="EventCal"></div>
