<?php
$this->breadcrumbs=array(
	'Schemes'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Schemes', 'url'=>array('index')),
	array('label'=>'Create Schemes', 'url'=>array('create')),
	array('label'=>'View Schemes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Schemes', 'url'=>array('admin')),
);
?>

<h1>Update Schemes <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>