<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'designation-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'designation_type_id'); ?>
	<?php echo $form->dropDownList($model,'designation_type_id',CHtml::listData(Designation_types::model()->findAll(),'id','name'),array('ajax'=>array('type'=>'POST',
	
	'url'=>CController::createUrl('designation/getLevelObjs'),
	'update'=>'#Designation_level_id')));?>
		<?php echo $form->error($model,'designation_type_id'); ?>
	</div>


	
	

	<div class="row">
		<?php echo CHtml::label('Place of Posting','Designation_level_id'); ?>
		<?php echo $form->dropDownList($model,'level_id',array()); ?>
		<?php echo $form->error($model,'level_id'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'details'); ?>
		<?php echo $form->textField($model,'details',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'details'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->