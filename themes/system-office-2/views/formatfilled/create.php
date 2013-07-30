<?php
$this->breadcrumbs=array(
	'Formatfilleds'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Formatfilled', 'url'=>array('index')),
	array('label'=>'Manage Formatfilled', 'url'=>array('admin')),
);
?>

<h1>Create Formatfilled</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>