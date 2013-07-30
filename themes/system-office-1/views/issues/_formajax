<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'issues-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnChange'=>false),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	
	<div class="row">
		<?php echo CHtml::label('Scheme:',false); ?>
		<?php echo $form->dropDownList($model,'schemeid',CHtml::listData(Schemes::model()->findAll(),'id','name'),array('empty'=>'Select Scheme'));?>
		<?php echo $form->error($model,'schemeid'); ?>
	</div>

	
	<div class="row">
	<?php echo $form->hiddenField($model,'from',array('value'=>Yii::app()->user->id));?>
		</div>

	<div class="row">
		<?php echo $form->labelEx($model,'to'); ?>
		<?php echo $form->dropDownList($model,'to',CHtml::listData(Designation::model()->findAll(),'id','name'),array('empty'=>'Select to whom to be sent'));?>
	<?php echo $form->error($model,'to'); ?>
	</div>
<div class="row">
<?php echo "Subject:" ?>
<?php echo $form->dropDownList($model,'tagid',CHtml::listData(Tags::model()->findAllByAttributes(array('schemeid'=>1)),'id','tag'),array('0'=>'Others'));?>
	<?php echo $form->error($model,'tagid'); ?>
	

</div>
	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
	<?php echo $form->hiddenField($model,'attachments',array('value'=>""));?>
		</div>
<div class="row buttons">
		<?php echo CHtml::ajaxSubmitButton("Save","",array(
		'dataType'=>'json',
		'success'=>"function(data)
                {
                    // data will contain the json data passed by the hpicheck action in the controller
                    // Update the status
                    $('#form').html(data);
                    
 
                } "),array("style"=>"visibility:hidden","id"=>"st1")); ?>
	</div>

	<?php $this->endWidget(); ?>

	
<?php
$this->widget('ext.p3extensions.widgets.jquery-file-upload.EFileUpload');
?>

<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

</div><!-- form -->
<script>
$(document).ready(
$("input[name=yt1]").click(function(){
$('input#Issues-attachments').val(" ");
$('table.files .file').each(function(){
var x = $(this).attr("href").match(/\/(\d+)$/)[1];
var y =$('input#Issues_attachments').val();
//alert(y);
$('#Issues_attachments').val(y+","+x);
});
//alert($('#Issues_attachments').val());
$('#st1').click();

})
);
</script>