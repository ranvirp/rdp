<?php
$this->breadcrumbs=array(
	'Tracks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tracks', 'url'=>array('index')),
	array('label'=>'Manage Tracks', 'url'=>array('admin')),
);
?>

<h1>Create Tracks</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>