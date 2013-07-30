<?php
$this->breadcrumbs=array(
	'Formats'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Formats', 'url'=>array('index')),
	array('label'=>'Create Formats', 'url'=>array('create')),
	array('label'=>'Update Formats', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Formats', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Formats', 'url'=>array('admin')),
);
?>

<h1>View Formats #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'schemeid',
		'name',
		'description',
		'formatfile_id',
		'xsd',
		'xml',
		'aggregator',
		'periodicity',
	),
)); ?>
