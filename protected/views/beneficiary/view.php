<?php
$this->breadcrumbs=array(
	'Beneficiaries'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Beneficiary', 'url'=>array('index')),
	array('label'=>'Create Beneficiary', 'url'=>array('create')),
	array('label'=>'Update Beneficiary', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Beneficiary', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Beneficiary', 'url'=>array('admin')),
);
?>

<h1>View Beneficiary #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'bwid',
		'name',
		'father',
		'husband',
		'dob',
		'age',
		'ason',
		'religion',
		'caste',
		'castename',
	),
)); ?>
