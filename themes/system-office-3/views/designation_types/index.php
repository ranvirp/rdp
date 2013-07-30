<?php
$this->breadcrumbs=array(
	'Designation Types',
);

$this->menu=array(
	array('label'=>'Create Designation_types', 'url'=>array('create')),
	array('label'=>'Manage Designation_types', 'url'=>array('admin')),
);
?>

<h1>Designation Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
