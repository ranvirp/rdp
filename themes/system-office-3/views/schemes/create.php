<?php
$this->breadcrumbs=array(
	'Schemes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Schemes', 'url'=>array('index')),
	array('label'=>'Manage Schemes', 'url'=>array('admin')),
);
?>

<h1>Create Schemes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>