<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'beneficiary-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'bwid'); ?>
		<?php echo $form->textField($model,'bwid',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'bwid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'father'); ?>
		<?php echo $form->textField($model,'father',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'father'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'husband'); ?>
		<?php echo $form->textField($model,'husband',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'husband'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dob'); ?>
		<?php echo $form->textField($model,'dob'); ?>
		<?php echo $form->error($model,'dob'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'age'); ?>
		<?php echo $form->textField($model,'age'); ?>
		<?php echo $form->error($model,'age'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ason'); ?>
		<?php echo $form->textField($model,'ason'); ?>
		<?php echo $form->error($model,'ason'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'religion'); ?>
		<?php echo $form->textField($model,'religion',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'religion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'caste'); ?>
		<?php echo $form->textField($model,'caste',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'caste'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'castename'); ?>
		<?php echo $form->textField($model,'castename',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'castename'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->