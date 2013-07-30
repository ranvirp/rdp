<?php
$this->breadcrumbs=array(
	'Instructions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Instructions', 'url'=>array('index')),
	array('label'=>'Manage Instructions', 'url'=>array('admin')),
);
?>

<h1>Create Instructions</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>