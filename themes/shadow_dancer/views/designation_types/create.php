<?php
$this->breadcrumbs=array(
	'Designation Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Designation_types', 'url'=>array('index')),
	array('label'=>'Manage Designation_types', 'url'=>array('admin')),
);
?>

<h1>Create Designation_types</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>