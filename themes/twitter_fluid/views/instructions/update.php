<?php
$this->breadcrumbs=array(
	'Instructions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Instructions', 'url'=>array('index')),
	array('label'=>'Create Instructions', 'url'=>array('create')),
	array('label'=>'View Instructions', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Instructions', 'url'=>array('admin')),
);
?>

<h1>Update Instructions <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>