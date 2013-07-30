<?php
$this->breadcrumbs=array(
	'Videoses'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Videos', 'url'=>array('index')),
	array('label'=>'Create Videos', 'url'=>array('create')),
	array('label'=>'View Videos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Videos', 'url'=>array('admin')),
);
?>

<h1>Update Videos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>