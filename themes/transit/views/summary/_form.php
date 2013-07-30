<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'summary-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'schemeid'); ?>
		<?php echo $form->textField($model,'schemeid'); ?>
		<?php echo $form->error($model,'schemeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'allottment'); ?>
		<?php echo $form->textField($model,'allottment'); ?>
		<?php echo $form->error($model,'allottment'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'received'); ?>
		<?php echo $form->textField($model,'received'); ?>
		<?php echo $form->error($model,'received'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'allotcentral'); ?>
		<?php echo $form->textField($model,'allotcentral'); ?>
		<?php echo $form->error($model,'allotcentral'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'allotstate'); ?>
		<?php echo $form->textField($model,'allotstate'); ?>
		<?php echo $form->error($model,'allotstate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'receivedstate'); ?>
		<?php echo $form->textField($model,'receivedstate'); ?>
		<?php echo $form->error($model,'receivedstate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'receivedcentral'); ?>
		<?php echo $form->textField($model,'receivedcentral'); ?>
		<?php echo $form->error($model,'receivedcentral'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->