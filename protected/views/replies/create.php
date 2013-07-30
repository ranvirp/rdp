<?php
$this->breadcrumbs=array(
	'Replies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Replies', 'url'=>array('index')),
	array('label'=>'Manage Replies', 'url'=>array('admin')),
);
?>

<h1>Create Replies</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>