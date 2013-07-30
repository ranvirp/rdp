<?php
$this->breadcrumbs=array(
	'Designations'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Designation', 'url'=>array('index')),
	array('label'=>'Create Designation', 'url'=>array('create')),
	array('label'=>'View Designation', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Designation', 'url'=>array('admin')),
);
?>

<h1>Update Designation <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>