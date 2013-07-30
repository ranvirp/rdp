<?php
$this->breadcrumbs=array(
	'Usertasks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Usertasks', 'url'=>array('index')),
	array('label'=>'Manage Usertasks', 'url'=>array('admin')),
);
?>

<h1>Create Usertasks</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>