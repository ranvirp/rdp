<?php
$this->breadcrumbs=array(
	'Formatfilleds',
);

$this->menu=array(
	array('label'=>'Create Formatfilled', 'url'=>array('create')),
	array('label'=>'Manage Formatfilled', 'url'=>array('admin')),
);
?>

<h1>Formatfilleds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
