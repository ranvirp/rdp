<?php
$this->breadcrumbs=array(
	'Usertasks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Usertasks', 'url'=>array('index')),
	array('label'=>'Create Usertasks', 'url'=>array('create')),
	array('label'=>'Update Usertasks', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Usertasks', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Usertasks', 'url'=>array('admin')),
);
?>

<h1>View Usertasks #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'designation_id',
		'scheme_id',
		'task_type',
		'task_id',
		'task_description',
		'deadline',
		'status',
	),
)); ?>
