<?php
$this->breadcrumbs=array(
	'Cashbooks'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Cashbook', 'url'=>array('index')),
	array('label'=>'Create Cashbook', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('cashbook-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Cashbooks</h1>

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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cashbook-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'schemeid',
		'from',
		'to',
		'amount',
		'dateoftr',
		/*
		'trtype',
		'trdetails',
		'trdoc',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
