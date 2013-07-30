<?php
$this->breadcrumbs=array(
	'Formatfilleds'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Formatfilled', 'url'=>array('index')),
	array('label'=>'Create Formatfilled', 'url'=>array('create')),
	array('label'=>'Update Formatfilled', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Formatfilled', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Formatfilled', 'url'=>array('admin')),
);
?>

<h1>View Formatfilled #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'usertask_id',
		'submittedreport',
		'author_id',
	),
)); ?>
