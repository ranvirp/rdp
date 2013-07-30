<?php
$this->breadcrumbs=array(
	'Works'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Works', 'url'=>array('index')),
	array('label'=>'Create Works', 'url'=>array('create')),
	array('label'=>'View Works', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Works', 'url'=>array('admin')),
);
?>

<h1>Update Works <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>