<?php
$this->breadcrumbs=array(
	'Beneficiaries',
);

$this->menu=array(
	array('label'=>'Create Beneficiary', 'url'=>array('create')),
	array('label'=>'Manage Beneficiary', 'url'=>array('admin')),
);
?>

<h1>Beneficiaries</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
