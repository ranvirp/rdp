<?php
$this->breadcrumbs=array(
	'Designations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Designation', 'url'=>array('index')),
	array('label'=>'Manage Designation', 'url'=>array('admin')),
);
?>

<h1>Create Designation</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>