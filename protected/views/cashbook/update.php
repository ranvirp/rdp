<?php
$this->breadcrumbs=array(
	'Cashbooks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cashbook', 'url'=>array('index')),
	array('label'=>'Create Cashbook', 'url'=>array('create')),
	array('label'=>'View Cashbook', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Cashbook', 'url'=>array('admin')),
);
?>

<h1>Update Cashbook <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>