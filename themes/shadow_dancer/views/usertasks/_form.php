<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usertasks-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'designation_id'); ?>
		<?php echo $form->textField($model,'designation_id'); ?>
		<?php echo $form->error($model,'designation_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'scheme_id'); ?>
		<?php echo $form->textField($model,'scheme_id'); ?>
		<?php echo $form->error($model,'scheme_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'task_type'); ?>
		<?php echo $form->textField($model,'task_type'); ?>
		<?php echo $form->error($model,'task_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'task_id'); ?>
		<?php echo $form->textField($model,'task_id'); ?>
		<?php echo $form->error($model,'task_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'task_description'); ?>
		<?php echo $form->textField($model,'task_description',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'task_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'deadline'); ?>
		<?php echo $form->textField($model,'deadline'); ?>
		<?php echo $form->error($model,'deadline'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->