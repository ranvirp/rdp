<?php
$this->breadcrumbs=array(
	'Beneficiaries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Beneficiary', 'url'=>array('index')),
	array('label'=>'Manage Beneficiary', 'url'=>array('admin')),
);
?>

<h1>Create Beneficiary</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>