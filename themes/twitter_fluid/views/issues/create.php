<?php
$this->breadcrumbs=array(
	'Issues'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'अनिस्तारित समस्याओं की सूची', 'url'=>array('index')),
	array('label'=>'निस्तारित समस्याओं की सूची', 'url'=>array('admin')),
);
?>

<h1>अपनी समस्या दर्ज कराएं </h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>