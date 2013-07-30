<?php
$this->breadcrumbs=array(
	'Designation Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Designation_types', 'url'=>array('index')),
	array('label'=>'Create Designation_types', 'url'=>array('create')),
	array('label'=>'View Designation_types', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Designation_types', 'url'=>array('admin')),
);
?>

<h1>Update Designation_types <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>