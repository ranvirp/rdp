<?php
$this->breadcrumbs=array(
	'Summaries'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Summary', 'url'=>array('index')),
	array('label'=>'Create Summary', 'url'=>array('create')),
	array('label'=>'Update Summary', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Summary', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Summary', 'url'=>array('admin')),
);
?>

<h1>View Summary #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'schemeid',
		'allottment',
		'received',
		'allotcentral',
		'allotstate',
		'receivedstate',
		'receivedcentral',
	),
)); ?>
