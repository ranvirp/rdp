<?php
$this->breadcrumbs=array(
	'Usertasks',
);

$this->menu=array(
	array('label'=>'Create Usertasks', 'url'=>array('create')),
	array('label'=>'Manage Usertasks', 'url'=>array('admin')),
);
?>

<h1>Usertasks</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
