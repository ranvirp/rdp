<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'instructions-form',
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
		<?php echo $form->labelEx($model,'from'); ?>
		<?php echo $form->textField($model,'from'); ?>
		<?php echo $form->error($model,'from'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'to'); ?>
		<?php echo $form->textField($model,'to'); ?>
		<?php echo $form->error($model,'to'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'instruction'); ?>
		<?php echo $form->textField($model,'instruction'); ?>
		<?php echo $form->error($model,'instruction'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'history'); ?>
		<?php echo $form->textField($model,'history'); ?>
		<?php echo $form->error($model,'history'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'attachments'); ?>
		<?php echo $form->textField($model,'attachments'); ?>
		<?php echo $form->error($model,'attachments'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parentinst'); ?>
		<?php echo $form->textField($model,'parentinst'); ?>
		<?php echo $form->error($model,'parentinst'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->