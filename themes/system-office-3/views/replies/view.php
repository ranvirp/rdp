<?php
$this->breadcrumbs=array(
	'Replies'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Replies', 'url'=>array('index')),
	array('label'=>'Create Replies', 'url'=>array('create')),
	array('label'=>'Update Replies', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Replies', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Replies', 'url'=>array('admin')),
);
?>

<h1>View Replies #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'issue_id',
		'content',
		'create_time',
		'author',
		'status',
		'update_time',
		'attachments',
	),
)); ?>
