<?php

class IssuesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','getLevelDetails'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Issues;
		// Uncomment the following line if AJAX validation is needed
		 $this->performAjaxValidation($model);
  
		if(isset($_POST['Issues']))
		{
			$model->attributes=$_POST['Issues'];
			if($model->save()){
			if ($model->attachments!=null){
			    $fileids = explode(",",$model->attachments);
				for ($i=1;$i<sizeof($fileids);$i++) {
				   $file = Files::model()->findByPk($fileids[$i]);
				   if ($file->uploadedby ==Yii::app()->user->id) {
					 $file->objecttype="issues";
					 $file->objectid=$model->id;
					 $file->save();
				   } 
				 
				}
				}
				
				//$this->redirect(array('view','id'=>$model->id));
				echo CJSON::encode(array('errors'=>$model->getErrors(),'redirect'=>$this->createURL("/issues/view",array('id'=>$model->id))));exit;
				}
		}
if (!Yii::app()->request->isAjaxRequest) {
 
		$this->render('create',array(
			'model'=>$model,
		));
		} else {
		$string=$this->renderPartial('_formajax',array(
			'model'=>$model,
		),true);
		echo CJSON::encode(array('html'=>$string,'errors'=>$model->getErrors()));
		
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Issues']))
		{
			$model->attributes=$_POST['Issues'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
	$status=0;
	if (array_key_exists('status',$_GET)){
	 $status=$_GET['status'];
	 } 
	 //echo $status;
	 //exit;
	$model=new Issues('search');
		
		$dataProvider=new CActiveDataProvider('Issues',array(
    'criteria'=>array(
        'condition'=>'status='.$status,
        
    ),
    'pagination'=>array(
        'pageSize'=>20,
    ),
));

		$this->render('_list',array(
			'dataP'=>$dataProvider,
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Issues('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Issues']))
			$model->attributes=$_GET['Issues'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Issues::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='issues-form')
		{
			 CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionGetLevelDetails(){
	$designation_type_id=$_POST['designation_type'];
	//echo $designation_type_id;
	//exit;
	$designations=Designation::model()->findAllByAttributes(array('designation_type_id'=>$designation_type_id));
	$designation_type = new Designation_types($designation_type_id);
	 $level=$designation_type->level;
	foreach ($designations as $designation){
	
	 $name = $level::model()->findByPk($designation->level_id)->name;
	 echo CHtml::tag('option',array('value'=>$designation->id),CHtml::encode($name),true);
	}
	/*
    foreach($data as $value=>$name)
    {
        echo CHtml::tag('option',
                   array('value'=>$value),CHtml::encode($name),true);
    }
	*/
	}
	public function actionAlterStatus()
	{
	
	}
}
