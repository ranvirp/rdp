<?php
$this->breadcrumbs=array(
	'Issues'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'समस्या दर्ज करें', 'url'=>array('create')),
	
	array('label'=>'अनिस्तारित समस्याओं की सूची', 'url'=>array('index')),
	array('label'=>'निस्तारित समस्याओं की सूची', 'url'=>array('index')),
	
);


?>

<h1>समस्या</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'issues-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		array(
		'name'=>'schemeid',
		'header'=>'योजना' ,
		'value'=>'$data->scheme->code',
		),
		
		array(
		'name'=>'tagid',
		'header'=>'विषय',
		'value'=>'$data->tags?$data->tags->tag:""',
		),
		array(
		'name'=>'description',
		'header'=>'विवरण',
		),
		
		array(
		'name'=>'to',
		'header'=>'किसको संदर्भित है ',
		 'value'=>'$data->tos?$data->tos->details:""',
		),
		array(
		
		'header'=>'संग्लग्नक :',
		'type'=>'html',
		'value'=>'Files::model()->showAttachments($data)',
		
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
