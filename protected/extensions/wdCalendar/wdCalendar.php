<?php
class wdCalendar extends CWidget {
	
	public $view = "maincalendar";
	public $initJs = null;
	
	public function init(){
		$this->registerClientScripts();
	}
	
	public function run(){
		$this->render($this->view);
	}

	private function registerClientScripts(){
	$cs = Yii::app()->clientScript;
		$am = Yii::app()->assetManager;
		$cs->registerCoreScript('jquery');
		$cs->registerCoreScript('jquery.ui');
		
		$assetsPath = dirname(__FILE__).DIRECTORY_SEPARATOR;
		$path=$am->publish($assetsPath."css");
		$cs->registerCssFile($path.'/dailog.css');
		$cs->registerCssFile($path.'/calendar.css');
		$cs->registerCssFile($path.'/main.css');
		$cs->registerCssFile($path.'/dp.css');

		Yii::app()->clientScript->registerScriptFile($am->publish($assetsPath.'src/jquery.js'));
		Yii::app()->clientScript->registerScriptFile($am->publish($assetsPath.'src/Plugins/Common.js'));
    
		Yii::app()->clientScript->registerScriptFile($am->publish($assetsPath.'src/Plugins/datepicker_lang_US.js'));
    
		Yii::app()->clientScript->registerScriptFile($am->publish($assetsPath.'src/Plugins/jquery.datepicker.js'));
    
		Yii::app()->clientScript->registerScriptFile($am->publish($assetsPath.'src/Plugins/jquery.alert.js'));
	    Yii::app()->clientScript->registerScriptFile($am->publish($assetsPath.'src/Plugins/jquery.ifrmdailog.js'));
		Yii::app()->clientScript->registerScriptFile($am->publish($assetsPath.'src/Plugins/wdCalendar_lang_US.js'));
		Yii::app()->clientScript->registerScriptFile($am->publish($assetsPath.'src/Plugins/jquery.calendar.js'));

		
		
	}
}
?>
