<?php
$this->breadcrumbs=array(
	'Tracks',
);

$this->menu=array(
	array('label'=>'Create Tracks', 'url'=>array('create')),
	array('label'=>'Manage Tracks', 'url'=>array('admin')),
);
?>

<h1>Tracks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
