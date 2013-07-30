<?php
$this->breadcrumbs=array(
	'Issues'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Issues', 'url'=>array('index')),
	array('label'=>'Create Issues', 'url'=>array('create')),
	array('label'=>'View Issues', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Issues', 'url'=>array('admin')),
);
?>

<h1>Update Issues <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>