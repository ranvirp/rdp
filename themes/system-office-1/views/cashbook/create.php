<?php
$this->breadcrumbs=array(
	'Cashbooks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cashbook', 'url'=>array('index')),
	array('label'=>'Manage Cashbook', 'url'=>array('admin')),
);
?>

<h1>Create Cashbook</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>