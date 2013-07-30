<?php
$this->breadcrumbs=array(
	'Formats',
);

$this->menu=array(
	array('label'=>'Create Formats', 'url'=>array('create')),
	array('label'=>'Manage Formats', 'url'=>array('admin')),
);
?>

<h1>Formats</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
