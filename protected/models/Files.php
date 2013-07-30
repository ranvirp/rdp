<?php

Yii::import('application.models._base.BaseFiles');

class Files extends BaseFiles
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public function rules()
	{
	    return array_merge(parent::rules(), array(
             array('originalname',
                     'file',
                     'allowEmpty' => true,
                     // 'types'=>'jpg, gif, png',
                     'maxSize'=>1024 * 1024 * 50, // 50MB
                     'tooLarge'=>'The file was larger than 50MB. Please upload a smaller file.',
             ),
         )
     );
 }
public function fileLink() {
     return CHtml::link($this->filename, CHtml::normalizeUrl(array('file', 'id' => $this->id)));
 }
  
 public function deleteFile() {
     if (strlen($this->filename) > 0 && file_exists($this->fileWithPath()) && !is_dir($this->fileWithPath())) {
         unlink($this->fileWithPath());
     }
 }
  
 protected function afterDelete() {
     parent::afterDelete();
     $this->deleteFile();
 }   

public static function cleanName($name, $maxLength = 0) {
		$name = preg_replace("/[^.A-Za-z0-9_-]/", "", $name);
		if ($maxLength > 0 && strlen($name) > $maxLength) {
			$name = substr($name, 0, $maxLength / 2 - 2) . ".." . substr($name, strlen($name) - $maxLength / 2 + 1);
		}
		return $name;
	}
	
	public static function generateUniqueFilename($path) {
		$pathinfo = pathinfo($path);
		return $pathinfo['filename'] . uniqid('-') . '.' . $pathinfo['extension'];
	}
	public function fileWithPath(){
	  return Yii::getPathOfAlias(Yii::app()->params['filesAlias']).DIRECTORY_SEPARATOR.$this->id.DIRECTORY_SEPARATOR.$this->originalname;
	}
	public static function showAttachments($model){
$x=$model->attachments; 
//echo $x;
	$y=explode(",",$x);
	$str= "<ul>";
	for ($i=1;$i<sizeof($y);$i++){
	  $files=Files::model()->findByPk($y[$i]);
	  $str.= "<li>".CHtml::link($files->originalname,Ccontroller::createUrl('/files/file',array('id'=>$y[$i])));
	}
	$str.= "</ul>";
	return $str;

}

}