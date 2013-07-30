<?php

class wdCalendarController extends CExtController
{

public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('df','edit','show'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}	
	public function actionShow(){
	Yii::import("ext.wdCalendar.wdCalendar");
	
	 $this->widget('wdCalendar');
	}
  public function actionDf()
  {
 // echo $this->getViewPath();
   
     $x=$this->renderPartial("php/datafeed",array('get'=>$_GET,'post'=>$_POST),false,true);
	 print $x;
	// exit;
  }
  public function actionEdit()
  {
   print $this->renderPartial("php/edit",array('get'=>$_GET),false,true);
  }
}

?>