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

<div class="form-title-bar">Create Instructions</div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>