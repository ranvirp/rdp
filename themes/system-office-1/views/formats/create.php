<?php
$this->breadcrumbs=array(
	'Formats'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Formats', 'url'=>array('index')),
	array('label'=>'Manage Formats', 'url'=>array('admin')),
);
?>

<h1>Create Formats</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>