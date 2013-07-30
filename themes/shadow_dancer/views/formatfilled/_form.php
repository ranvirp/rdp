<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'formatfilled-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'usertask_id'); ?>
		<?php echo $form->textField($model,'usertask_id'); ?>
		<?php echo $form->error($model,'usertask_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'submittedreport'); ?>
		<?php echo $form->textField($model,'submittedreport'); ?>
		<?php echo $form->error($model,'submittedreport'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author_id'); ?>
		<?php echo $form->textField($model,'author_id'); ?>
		<?php echo $form->error($model,'author_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->