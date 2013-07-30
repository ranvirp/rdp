<?php
$this->breadcrumbs=array(
	'Issues'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Issues ', 'url'=>array('index')),
	array('label'=>'Create Issue', 'url'=>array('create')),
	array('label'=>'Update Issue', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Issue', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Do you want to delete this entry?')),
	array('label'=>'Issue Management', 'url'=>array('admin')),
);
?>

<h1>Issue # <?php echo $model->id?></h1>

<?php 


$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		array(
		'label'=>'Scheme',
		'type'=>'html',
		'value'=>$model->scheme->name,
		),
		array(
		'label'=>'From:',
		'value'=>$model->froms->designation_type->name.",".Designation::model()->getLevelObj($model->froms->designation_type->level,$model->froms->level_id),
		),
		array(
		'label'=>'Referenced to:',
		'value'=>$model->tos->designation_type->name.",".Designation::model()->getLevelObj($model->tos->designation_type->level,$model->tos->level_id),
		),
		
		array(
		'name'=>'description',
		'label'=>'Details ',
		),
		array(
		'label'=>'Attachments :',
		'type'=>'html',
		'value'=>Files::model()->showAttachments($model),
		
		),
	),
));
echo $this->renderPartial('_replies',array(
			'replies'=>$model->replies,
		),true); 
	 
echo CHtml::ajaxButton('Mark replies',Ccontroller::createUrl('/replies/create',array('content_type'=>'issues','content_type_id'=>$model->id)),array('dataType'=>'json',
	'success'=>"function(data){
	$('#commentdiv').html(data.html);
	}"));
	
?>
<div id="commentdiv"></div>
