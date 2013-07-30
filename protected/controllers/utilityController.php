<?php

class UtilityController extends Controller
{
	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return CMap::mergeArray(parent::filters(),array(
			'accessControl', // perform access control for CRUD operations
		));
	}
	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','getName','ExcelToModel','login','cal'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}	

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=User::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}


	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the primary key value. Defaults to null, meaning using the 'id' GET variable
	 */
	public function loadUser($id=null)
	{
		if($this->_model===null)
		{
			if($id!==null || isset($_GET['id']))
				$this->_model=User::model()->findbyPk($id!==null ? $id : $_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	public function actionGetName(){
	if (Yii::app()->request->isAjaxRequest) {
 
            // get the parameter passed via ajax from the _form.php
            $userid = Yii::app()->request->getParam('userid');
            $this->loadUser($userid);
			
            if ($userid != '')
            {
                echo CJSON::encode(array(
                    'error' => 'false',
                    'name' => $this->_model->profile->firstname." ".$this->_model->profile->lastname,
                ));
                // exit;
                Yii::app()->end();
            }
	}
}
public function actionCal(){
//Yii::import('application.vendors.wdCalendar.*');
//Yii::setPathOfAlias('src',Yii::getPathOfAlias('application.vendors.wdCalendar.src'));
//Yii::setPathOfAlias('css',Yii::getPathOfAlias('application.vendors.wdCalendar.css'));
 
	// $this->render("application.vendors.wdCalendar.sample1");
$x=	$this->renderPartial("cal",array(),false,true);
print $x;
}
public function actionExcelToModel(){

if (Yii::app()->request->isAjaxRequest) {
 
            // get the parameter passed via ajax from the _form.php
             $map = Yii::app()->request->getParam('map');
			 $attachment = Yii::app()->request->getParam('attachments');
			 $modelclass=Yii::app()->request->getParam('modelclass');
			  $rowbegin=Yii::app()->request->getParam('rowbegin');
			   $rowend=Yii::app()->request->getParam('rowend');
			 $attachment=explode(",",$attachment);
			 $excelfile=$attachment[1];
			 echo  json_encode(array('html'=>Utility::excelToModel($modelclass,$excelfile,$rowbegin,$rowend,json_decode($map,true))));
			 Yii::app()->end();
            
	}
$model = new Utility;

$this->render("_form",array('model'=>$model));
}
public function actionLogin()
{
  $username= $_GET['username'];
  $password=$_GET['password'];
  $userlogin = new UserLogin;
  $userlogin->username=$username;
  $userlogin->password=$password;
  if ($userlogin->validate()) {
    echo 1;
  }
  else {
  echo 0;
  }
}
}
