<?php
$this->breadcrumbs=array(
	'Beneficiaries'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Beneficiary', 'url'=>array('index')),
	array('label'=>'Create Beneficiary', 'url'=>array('create')),
	array('label'=>'View Beneficiary', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Beneficiary', 'url'=>array('admin')),
);
?>

<h1>Update Beneficiary <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>