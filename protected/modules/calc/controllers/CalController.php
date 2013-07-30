<?php

/**
 * @author Serg.Kosiy <serg.kosiy@gmail.com>
 */
class CalController extends UICalendarController
{

    // uncomment the following to apply new layout for the controller view.
    // public $layout = 'column2';

    public function init()
    {
        parent::init();

        // Admin has browse & modify users calendar
        $this->setAdminMode(true);
        // set users list for admin
        $this->setUsersList(
                array(
                    '1' => 'admin',
                    '2' => 'demo1',
                    '4' => 'demo2',
                    '5' => 'demo3',
                    '9' => 'demo4',
                )
        );
        // uncomment the following to apply jQuery UI theme
        // from protected/components/assets/themes folder
        $this->applyTheme('redmond');

        // uncomment the following to enable context menu and add needed items
        /*
          $this->menu = array(
          array('label' => 'Index', 'url' => array('index')),
          );
         */
    }

}

?>
