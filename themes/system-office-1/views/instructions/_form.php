<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'instructions-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php 
	foreach(Designation_types::model()->findAll() as $model1){

    $listData[$model1->id]=$model1->name;
	
	}
	$from = Designation::model()->findByAttributes(array('user'=>Yii::app()->user->id))->id;

	?>
	<table>
	<tr>
	<td>
		
		<div class="row">
		<?php echo $form->labelEx($model,'to'); ?>
		<?php echo CHtml::dropDownList("designation_type",'',$listData,
		array(
		'ajax'=>array(
		'type'=>'POST',
		'url'=>CController::createUrl('issues/getLevelDetails'),
		//'data'=>'js:jQuery(this).parents("form").serialize()',
		'update'=>'#Instructions_to',
		),
		
		));?>
		<?php echo $form->dropDownList($model,'to',array());?>
	<?php echo $form->error($model,'to',""); ?>
	</div>
	</td></tr>
	<tr>
	<td>
	<div class="row">
		<?php echo CHtml::label('Scheme:',false); ?>
		<?php echo $form->dropDownList($model,'schemeid',CHtml::listData(Schemes::model()->findAll(),'id','name'),array('empty'=>'Select Scheme'));?>
		<?php echo $form->error($model,'schemeid'); ?>
	
	<?php echo $form->hiddenField($model,'from',array('value'=>$from));?>

	<div class="row">
		<?php echo $form->labelEx($model,'instruction'); ?>
		<?php echo $form->textArea($model,'instruction',array('rows'=>5,'cols'=>50)); ?>
		
		<?php echo $form->error($model,'instruction'); ?>
	</div>
</td></tr>
</table>
	<span>
	<?php echo $form->hiddenField($model,'attachments',array('value'=>""));?>
		</span>
<span>
		<?php echo CHtml::ajaxSubmitButton("Save","",
		array('dataType'=>'json',
		'success'=>"function(data)
                {
				if (!data.redirect){
                    // Update the status
                    $('.form').html(data.html);
					}
				else {
				alert(data.redirect);
				   window.location.replace(data.redirect);
				   }
                    
 
                } "),array("style"=>"visibility:hidden","id"=>"st1")); ?>
	
</span>
	<?php $this->endWidget(); ?>
	<div style="position:relative;top:-40px;">
	
<?php
$this->widget('ext.jquery_upload.EFileUpload');
?>
</div>
</div><!-- form -->

<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<script>
$(document).ready(
$("input[name=yt1]").click(function(){
$('input#Instructions-attachments').val(" ");
$('table.files .file').each(function(){
var x = $(this).attr("href").match(/\/(\d+)$/)[1];
var y =$('input#Instructions_attachments').val();
//alert(y);
$('#Instructions_attachments').val(y+","+x);
});
//alert($('#Instructions_attachments').val());
$('#st1').click();

})
);
</script>
	