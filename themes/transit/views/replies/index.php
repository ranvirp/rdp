<?php
$this->breadcrumbs=array(
	'Replies',
);

$this->menu=array(
	array('label'=>'Create Replies', 'url'=>array('create')),
	array('label'=>'Manage Replies', 'url'=>array('admin')),
);
?>

<h1>Replies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
