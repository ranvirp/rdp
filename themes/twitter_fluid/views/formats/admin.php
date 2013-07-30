<?php
$this->breadcrumbs=array(
	'Formats'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Formats', 'url'=>array('index')),
	array('label'=>'Create Formats', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('formats-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Formats</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
<?php
function showLink($y){
$files=Files::model()->findByPk($y);
return CHtml::link($files->originalname,Ccontroller::createUrl('/files/file',array('id'=>$y)));
}

?>
<?php 


$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'formats-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
		'name'=>'schemeid',
		'header'=>'योजना' ,
		'value'=>'$data->scheme->code',
		),
		'name',
		'description',
		array(
		'name'=>'formatfile_id',
		'header'=>'Attachment',
		'type'=>'html',
		'value'=>'showLink($data->formatfile_id)',
		),
		'xsd',
		/*
		'xml',
		'aggregator',
		'periodicity',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
