<?php
$this->breadcrumbs=array(
	'Instructions',
);

$this->menu=array(
	array('label'=>'Create Instructions', 'url'=>array('create')),
	array('label'=>'Manage Instructions', 'url'=>array('admin')),
);
?>

<h1>Instructions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
