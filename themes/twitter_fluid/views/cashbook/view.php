<?php
$this->breadcrumbs=array(
	'Cashbooks'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Cashbook', 'url'=>array('index')),
	array('label'=>'Create Cashbook', 'url'=>array('create')),
	array('label'=>'Update Cashbook', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Cashbook', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Cashbook', 'url'=>array('admin')),
);
?>

<h1>View Cashbook #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'schemeid',
		'from',
		'to',
		'amount',
		'dateoftr',
		'trtype',
		'trdetails',
		'trdoc',
	),
)); ?>
