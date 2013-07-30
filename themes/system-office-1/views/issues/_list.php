<?php
$this->breadcrumbs=array(
	'Issues'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'समस्या दर्ज करें', 'url'=>array('issues/create')),
	
	array('label'=>'अनिस्तारित समस्याओं की सूची', 'url'=>array('issues/index','status'=>0)),
	array('label'=>'निस्तारित समस्याओं की सूची ', 'url'=>'index?status=1'),
	
);


?>

<h1>समस्या</h1>


<?php 
print_r($data);
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'issues-grid',
	'dataProvider'=>$dataP,
	'filter'=>$model,
	'columns'=>array(
		//'id',
		array(
		'name'=>'schemeid',
		'header'=>'Scheme' ,
		'value'=>'$data->scheme->code',
		),
		
		array(
		'name'=>'tagid',
		'header'=>'Subject',
		'value'=>'$data->tags?$data->tags->tag:""',
		),
		array(
		'name'=>'description',
		'header'=>'Details',
		),
		
		array(
		'name'=>'to',
		'header'=>'Referenced to ',
		 'value'=>'$data->tos?$data->tos->designation_type->name.",".Designation::model()->getLevelObj($data->tos->designation_type->level,$data->tos->level_id):""',
		),
                  
                 
		array(
		
		'header'=>'Attachments :',
		'type'=>'html',
		'value'=>'Files::model()->showAttachments($data)',
		
		),
		array(
		'name'=>'status',
		'header'=>'Status',
		'value'=>'$data->status?"Disposed":"Pending"',
		),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
