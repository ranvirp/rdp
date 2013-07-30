<?php
$this->breadcrumbs=array(
	'Formats'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Formats', 'url'=>array('index')),
	array('label'=>'Create Formats', 'url'=>array('create')),
	array('label'=>'View Formats', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Formats', 'url'=>array('admin')),
);
?>

<h1>Update Formats <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>