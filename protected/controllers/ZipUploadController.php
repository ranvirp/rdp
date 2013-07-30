<?php
class ZipUploadController extends Controller

{
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
				'actions'=>array('index','view','upload'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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

    public function actionUpload()
	{
     //   header('Content-type: text/plain; charset=utf-8');
	
  $settings =$this->getServerSettings();
   //$myFile ="/Users/mac/dev/data/". "testFile.txt";
//$fh = fopen($myFile, 'w') or die("can't open file");
//$stringData = $_POST['photoxml'];
//fwrite($fh, $stringData);
//$stringData = $_POST['videoxml'];
///fwrite($fh, $stringData);
//fclose($fh);
  
  $photoxml= simplexml_load_string($_POST['photoxml']);
  //print_r($photoxml);
  //exit;
  
  $videoxml=simplexml_load_string($_POST['videoxml']);
  $tracksxml=simplexml_load_string($_POST['tracksxml']);
 
  $bwid=getBwId();
  $authToken=$_POST['l'];
  $email= file_get_contents("https://www.googleapis.com/oauth2/v1/userinfo?alt=json&access_token=$authToken");
  if (!$email){
     // header(400);
      return "";
  }
  //$zipfile=$_FILES['file'];
  //get settings about this from server
  $upload_location=$settings->upload_location;
  $tmp_location=$settings->tmp_location;
  move_uploaded_file($_FILES['file']['tmp_name'], $tmp_location.$_FILES['file']['name']);
  
  $uuid=  uniqid();
  mkdir($tmp_location."/".$uuid,true);
  //unzip file into tmp directory
  $zip = new ZipArchive;
$res = $zip->open($tmp_location.$_FILES['file']['name']);
if ($res === TRUE) {
  $zip->extractTo($tmp_location."/".$uuid);
  $zip->close();
 // echo 'woot!';
} else {
 // echo 'doh!';
}
 // unzip($tmp_location.$_FILES['file']['name'],$tmp_location."/".$uuid);
 // $noofphotos = getNoOfPhotos($photoxml);
  foreach($photoxml->photo as $photo)
  {
      $photoModel=new model('Photos');
      $bwid=$photo['bwid'];
      $photoModel->location=$upload_location."/".$bwid."/photos/".$photo['uri'];
      $photoModel->bwid=$bwid;
      $photoModel->gpslat=$photo['gpslat'];
      $photoModel->gpslon=$photo['gpslon'];
      $photoModel->gpsalt=$photo['gpslat'];
      $photoModel->gpsacc=$photo['gpsacc'];
      $photoModel->name=$photo['caption'];
      $photoModel->save();
      //save photo to upload_location
      //open file $tmp_location."/".$uuid."/".$photo->attributes()->name
      //save file to $upload_location."/".$bwid."/".$photoModel->id."/.jpg";
  }
  foreach($videoxml->video as $video)
  {
      $videoModel=new model('videos');
      $bwid=$video['bwid'];
      $videoModel->location=$upload_location."/".$bwid."/videos/".$video['uri'];
      $videoModel->bwid=$bwid;
      $videoModel->gpslat=$video['gpslat'];
      $videoModel->gpslon=$video['gpslon'];
      $videoModel->gpsalt=$video['gpslat'];
      $videoModel->gpsacc=$video['gpsacc'];
      $videoModel->name=$video['caption'];
      $videoModel->save();
      //save video to upload_location
      //open file $tmp_location."/".$uuid."/".$video->attributes()->name
      //save file to $upload_location."/".$bwid."/".$videoModel->id."/.jpg";
  }
  foreach($tracksxml->track as $track)
  {
      $trackModel=new model('Tracks');
      $trackModel->location=$upload_location."/".$bwid."/tracks/".$video['uri'];;
      $trackModel->bwid=$bwid;
      $trackModel->name=$track['caption'];
      
      $trackModel->save();
      //save photo to upload_location
      //open file $tmp_location."/".$uuid."/".$photo->attributes()->name
      //save file to $upload_location."/".$bwid."/".$photoModel->id."/.jpg";
  }
  
        }
   function     getServerSettings(){
       
       $settings =array();
       foreach (Settings::model()->findAll() as $ar){
           $settings[$ar->varname]=$ar->varvalue;
       }
       return (object) $settings;
   }
        
}
 ?>