<?php
Yii::import('ext.jquery_upload.*');

class FilesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
        public function actions()
    {
        return array(
            'upload'=>array(
                'class'=>'ext.xupload.actions.XUploadAction',
                'path' =>Yii::app() -> getBasePath() . "/data/files",
                'publicPath' => Yii::app() -> getBaseUrl() . "/files",
            ),
        );
    }
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
				'actions'=>array('create','update','uploadFile','file','upload'),
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
        public function actionIndex1() {
        Yii::import("xupload.models.XUploadForm");
        $model = new XUploadForm;
        $this -> render('index', array('model' => $model, ));
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
	 $model = new Files;
	 $this->render('create',array(
			'model'=>$model,
		));

	 	
	 }
	 public function actionUploadFile(){
	 $contents = $this->uploadHandler();
		echo $contents;
		exit;
	
	 
	 }
	public function actionCreate1()
	{
		$model=new Files;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Files']))
		{
			$model->attributes=$_POST['Files'];
			
			if($model->save()){
			$file = CUploadedFile::getInstance($model, 'originalname');
			if (is_object($file) && get_class($file)==='CUploadedFile') {          
				$model->filename = $file;
			} else {
				$model->filename = "";
			}   
			
			if (is_object($file) && get_class($file)==='CUploadedFile') {
         // again, if anything was uploaded and if we have db done then move the file from tmp to the right place
               $model->filename->saveAs(Yii::app()->basePath . '/files/' . $model->filename->name);
                //unlink($model->fileWithPath(Yii::app()->basePath . '/files/' . $oldfilename));
             
            }                   
				//$this->redirect(array('view','id'=>$model->id));
				exit;
				}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	 /*
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Files']))
		{
			$model->attributes=$_POST['Files'];
			if($model->save()){  
			    
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
*/
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
		$dataProvider=new CActiveDataProvider('Files');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Files('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Files']))
			$model->attributes=$_GET['Files'];

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
		$model=Files::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='files-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	public function actionFile($id) {
     $model = $this->loadModel($id);   
     if (file_exists($model->fileWithPath())) {
         header("Pragma: no-cache");
         header("Expires: 0");
         header('Content-Description: File Transfer');
         header('Content-Type: ' . CFileHelper::getMimeType($model->fileWithPath()));
         header('Content-Disposition: attachment; filename="'.$model->originalname.'"');
         header('Content-Transfer-Encoding: binary');
         header('Expires: 0');
         header('Cache-Control: must-revalidate');
         header('Pragma: public');
         header('Content-Length: ' . filesize($model->fileWithPath()));      
         readfile($model->fileWithPath());           
         Yii::app()->end();
     } else {
         throw new CHttpException(404, 'Not found');
     }
 }
  public function actionUploadFile1() {
		$contents = $this->uploadHandler();
		echo $contents;
		exit;
		#echo CJSON::encode($result);
	}
	
	private function uploadHandler(){
		$options = array(
			'url' => $this->createUrl("/files/",array('path'=>Yii::app()->user->id."/")),
			'upload_dir' => Yii::getPathOfAlias(Yii::app()->params['filesAlias']).DIRECTORY_SEPARATOR,
			'upload_url' => $this->createUrl("/files/file"),
			'script_url' => $this->createUrl("/files/uploadFile",array('path'=>Yii::app()->user->id."/")),
			'field_name' => 'files',
			'image_versions' => array(
                // Uncomment the following version to restrict the size of
                // uploaded images. You can also add additional versions with
                // their own upload directories:
                /*
                'large' => array(
                    'upload_dir' => dirname(__FILE__).'/files/',
                    'upload_url' => dirname($_SERVER['PHP_SELF']).'/files/',
                    'max_width' => 1920,
                    'max_height' => 1200
                ),
                */
               
            ),

		);

		// wrapper for jQuery-file-upload/upload.php
		$upload_handler = new UploadHandler($options);
		header('Pragma: no-cache');
		header('Cache-Control: private, no-cache');
		header('Content-Disposition: inline; filename="files.json"');
		header('X-Content-Type-Options: nosniff');

		ob_start();
		switch ($_SERVER['REQUEST_METHOD']) {
			case 'HEAD':
			case 'GET':
				$upload_handler->get();
				$contents = ob_get_contents();
				break;
			case 'POST':
				// check if file exists
				$upload = $_FILES[$options['field_name']];
				$tmp_name = $_FILES[$options['field_name']]['tmp_name'];
				if (is_array($tmp_name))
				foreach ($tmp_name AS $index => $value){
					//$model = files::model()->findByAttributes(array('path' => Yii::app()->user->id.DIRECTORY_SEPARATOR.$upload['name'][$index]));
					$model = new Files;
					
					$attributes['path'] = Yii::app()->user->id.DIRECTORY_SEPARATOR.$upload['name'][$index];
					$attributes['title'] = $upload['name'][$index]; // TODO: fix title unique check
					
					#var_dump($attributes['title']);exit;
					
					$model->attributes = $attributes;
					//var_dump($attributes);exit;
					$model->validate();
					
					if ($model->hasErrors()) {
						#throw new CHttpException(500, 'File exists.');
						$file = new stdClass();
						$file->error = "";
						foreach($model->getErrors() AS $error) {						
    						$file->error .= $error[0];
    					}
						$info[] = $file;
						echo CJSON::encode($info);
						exit;
					}
				}
				
				$upload_handler->post();
				$contents = ob_get_contents();
				$result = CJSON::decode($contents);
				
				#var_dump($result);exit;
				$attr=$this->createMedia($result[0]['name'], Yii::app()->params['filesAlias']);
				$result[0]['url'].="/".$attr['id'];
				$result[0]['delete_url'].="?id=".$attr['id'];
				
				$contents=CJSON::encode($result);
				break;
			case 'DELETE':
				//$upload_handler->delete();
				//$contents = ob_get_contents();
				$result = $this->deleteMedia($_GET['id']);
				break;
			default:
				header('HTTP/1.0 405 Method Not Allowed');
				$contents = ob_get_contents();
		}
		ob_end_clean();
		
		return $contents;
	}
	private function createMedia($fileName, $filePath) {
		$fullFilePath = Yii::getPathOfAlias(Yii::app()->params['filesAlias']) . DIRECTORY_SEPARATOR.$fileName ;
		$md5 = md5_file($fullFilePath);
		$getimagesize = getimagesize($fullFilePath);

		$model = new Files;
		//$model->detachBehavior('Upload');
		
		$model->title = Files::cleanName($fileName, 32);
		$model->originalname = $fileName;

		//$model->type = 1; //P3Media::TYPE_FILE;
		$model->path = $filePath;
		$model->md5 = $md5;
		if (!$mime = $this->_mime_content_type($fullFilePath)) {
			$mime = $getimagesize['mime'];
		}
		$model->mimetype = $mime;
		//$model->info = CJSON::encode(getimagesize($fullFilePath));
		$model->size = filesize($fullFilePath);

		if ($model->save()) {
		    if (!is_dir(Yii::getPathOfAlias(Yii::app()->params['filesAlias']).DIRECTORY_SEPARATOR.$model->id)){
				mkdir (Yii::getPathOfAlias(Yii::app()->params['filesAlias']).DIRECTORY_SEPARATOR.$model->id.'/');
				}
				rename($fullFilePath,Yii::getPathOfAlias(Yii::app()->params['filesAlias']).DIRECTORY_SEPARATOR.$model->id.DIRECTORY_SEPARATOR.$fileName);
				
			return $model->attributes;
		} else {
			$errorMessage = "";
			foreach ($model->errors AS $attrErrors) {
				$errorMessage .= implode(',', $attrErrors);
			}
			throw new CHttpException(500, $errorMessage);
		}
	}
	private function deleteMedia($id) {
		$attributes['id'] = $id;
		$model = Files::model()->findByAttributes($attributes);
		#unlink($this->getDataPath(true) . DIRECTORY_SEPARATOR . $fileName);
		$model->delete();
		return true;
	}
	
	private function findMd5($md5) {
		$model = Files::model()->findByAttributes(array('md5' => $md5));
		if ($model === null)
			return false;
		else
			return true;
	}
	public function _mime_content_type($filename)
{
    $result = new finfo();

    if (is_resource($result) === true)
    {
        return $result->file($filename, FILEINFO_MIME_TYPE);
    }

    return false;
}


	
}
