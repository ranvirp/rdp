<?php
$this->breadcrumbs=array(
	'Schemes'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Schemes', 'url'=>array('index')),
	array('label'=>'Create Schemes', 'url'=>array('create')),
	array('label'=>'Update Schemes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Schemes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Schemes', 'url'=>array('admin')),
);
?>

<h1>View Schemes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'parentid',
		'name',
		'depid',
		'code',
		'admin',
	),
)); ?>
