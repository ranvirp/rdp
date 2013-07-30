<?php
$this->breadcrumbs=array(
	'Replies'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Replies', 'url'=>array('index')),
	array('label'=>'Create Replies', 'url'=>array('create')),
	array('label'=>'View Replies', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Replies', 'url'=>array('admin')),
);
?>

<h1>Update Replies <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>