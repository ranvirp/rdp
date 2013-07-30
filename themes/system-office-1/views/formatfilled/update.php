<?php
$this->breadcrumbs=array(
	'Formatfilleds'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Formatfilled', 'url'=>array('index')),
	array('label'=>'Create Formatfilled', 'url'=>array('create')),
	array('label'=>'View Formatfilled', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Formatfilled', 'url'=>array('admin')),
);
?>

<h1>Update Formatfilled <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>