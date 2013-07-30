<?php
class Utility {
/*
$model: class to which to be imported
$excelfile: id of the file to be imported
$map: array($field1=>$col1,
             $field2=>$col2,


*/
public static function excelToModel($modelclass,$excelfile,$rowbegin,$rowend,$map){
Yii::import('application.vendors.simplexlsx.*');
$output=array();
//get path of excelfile
$file = Files::model()->findByPk($excelfile);
$excelfile=Yii::getPathOfAlias(Yii::app()->params['filesAlias']).DIRECTORY_SEPARATOR.$file->id.DIRECTORY_SEPARATOR.$file->originalname;

if (preg_match("/xlsx$/",$file->originalname)!=0){
//require_once(Yii::getPathOfAlias('application.vendors.simplexlsx.simplexlsx\..class\..php'));
//Yii::import('application.vendors.simplexlsx.simplexlsx\.class.php');
$xlsx = new SimpleXLSX($excelfile);
$rows=$xlsx->rows();
//var_dump($rows);
//exit;
for($row=$rowbegin;$row<=$rowend;$row++)
{
  $model= new $modelclass;
  $str="";
 try{
  foreach ($map as $field=>$col) {
	if (is_array($col)) {
		$colnew = $col['col'];
		$_model=$col['model'];
		$_attr=$col['attr'];
		$_field=$col['field'];
		$model->$field = $_model::model()->findByAttributes(array($_attr=>$rows[$row-$rowbegin+1][$colnew]))->$_field;
		$str.=$model->$field;
		$str.=",";
    } else {
	//print_r($rows[$row-$rowbegin+1][$col]);
	//print_r($model);
	//echo $field;

	//exit;
	$stemp=$rows[$row-$rowbegin+1][$col];
	//echo print_r($rows);
	//echo print_r($map);
	//exit;
	
	//$stemp="hi";
	$model->$field=(string)$stemp;
	
	
	$str.=$model->$field.",";
	}
	}
	} catch (Exception $ex) {
	//echo ($ex->getMessage()."\$field");
	}
	$output[$row-$rowbegin][0]=$str;
	 if ($model->save()){
     
	 $output[$row-$rowbegin][1]="Saved without errors";
   } else {
     $output[$row-$rowbegin][1]="Not saved due to error(s) ".$model->getError('name');
    } 
  
  }
  

}

else {
if (preg_match("/xls$/",$file->originalname)!=0) {
//require_once('php-excel-reader/excel_reader2.php');
Yii::import('application.vendors.php-excel-reader.*');
$xls = new Spreadsheet_Excel_Reader($excelfile);
for($row=$rowbegin;$row<=$rowend;$row++)
{
  $model= new $modelclass;
  $str="";
  foreach ($map as $field=>$col) {
	if (is_array($col)) {
		$colnew = $col['col'];
		$_model=$col['model'];
		$_attr=$col['attr'];
		$_field=$col['field'];
		$str.=$model->$field = $_model::model()->findByAttributes(array($_attr=>$xls->val($row,$colnew)))->$_field;
		$str.=",";
    } else {
	$str.=$model->$field=$xls->val($row,$col);
	$str.=",";
	}
	$output[$row][0]=$str;
   if ($model->save()){
     
	 $output[$row][1]="Saved without errors";
   } else {
     $output[$row][1]="Not saved due to Errors";
    } 
  }
  

}
} else {
//echo "error in excel file\n"; exit;
}
}
$str1= "<table border=1><th>Row</th><th>Data</th><th>Result</th>";
foreach ($output as $row=>$arr) {
$str1.= "<tr><td>".$row."</td>"."<td>".$output[$row][0]."</td>"."<td>".$output[$row][1]."</td>"."</tr>"."";

}
 $str1.="</table>";
return $str1;
//return CJSON::encode(array('html'=>$str1));
}

}

?>