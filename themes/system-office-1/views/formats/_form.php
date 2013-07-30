<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'formats-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo CHtml::label('Scheme:',false); ?>
		<?php echo $form->dropDownList($model,'schemeid',CHtml::listData(Schemes::model()->findAll(),'id','name'),array('empty'=>'Select Scheme'));?>
		<?php echo $form->error($model,'schemeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>



	<div class="row">
		<?php echo $form->labelEx($model,'xsd'); ?>
		<?php echo $form->textArea($model,'xsd',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'xsd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'xml'); ?>
		<?php echo $form->textArea($model,'xml',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'xml'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'aggregator'); ?>
		<?php echo $form->textArea($model,'aggregator',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'aggregator'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'periodicity'); ?>
		<?php echo $form->textField($model,'periodicity',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'periodicity'); ?>
	</div>
<div class="row">
	<?php echo CHtml::hiddenField('attachments',"");?>
		</div>
		<div class="row">
		<?php echo CHtml::label('Assigned to:',false); ?>
		
	
		
		
		<?php 
		foreach(Designation::model()->findAll() as $designation) {
		   $designation_name = $designation->designation_type->name;
		   $designation_level=$designation->designation_type->level;
		   $designation_level_name= $designation_level::model()->findByPk($designation->level_id)->name;
		   $data[$designation->id]=$designation_name.",".$designation_level_name;
		}
		 echo CHtml::dropDownList('assigned[]',array(),$data, array('multiple'=>'multiple',
        'key'=>'trainings', 'class'=>'multiselect'));?>
		</div>

	<div class="row buttons">
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
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<?php
$this->widget('ext.jquery_upload.EFileUpload');
?>

<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<script>
$(document).ready(
$("input[name=yt1]").click(function(){
$('input#attachments').val(" ");
$('table.files .file').each(function(){
var x = $(this).attr("href").match(/\/(\d+)$/)[1];
var y =$('input#attachments').val();
//alert(y);
$('#attachments').val(y+","+x);
});
//alert($('#Issues_attachments').val());
$('#st1').click();

})
);
</script>