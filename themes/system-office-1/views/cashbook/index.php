<?php
$this->breadcrumbs=array(
	'Cashbooks',
);

$this->menu=array(
	array('label'=>'Create Cashbook', 'url'=>array('create')),
	array('label'=>'Manage Cashbook', 'url'=>array('admin')),
);
?>

<h1>Cashbooks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
