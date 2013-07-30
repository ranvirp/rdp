<?php
$this->breadcrumbs=array(
	'Usertasks'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Usertasks', 'url'=>array('index')),
	array('label'=>'Create Usertasks', 'url'=>array('create')),
	array('label'=>'View Usertasks', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Usertasks', 'url'=>array('admin')),
);
?>

<h1>Update Usertasks <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>