<?php
$this->breadcrumbs=array(
	'Works'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Works', 'url'=>array('index')),
	array('label'=>'Manage Works', 'url'=>array('admin')),
);
?>

<h1>Create Works</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>