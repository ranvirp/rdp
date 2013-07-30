<?php
$this->breadcrumbs=array(
	'Designation Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Designation_types', 'url'=>array('index')),
	array('label'=>'Create Designation_types', 'url'=>array('create')),
	array('label'=>'Update Designation_types', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Designation_types', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Designation_types', 'url'=>array('admin')),
);
?>

<h1>View Designation_types #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'level',
		'dept_id',
	),
)); ?>
