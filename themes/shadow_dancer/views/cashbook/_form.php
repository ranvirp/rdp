<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cashbook-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

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
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount'); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateoftr'); ?>
		<?php echo $form->textField($model,'dateoftr'); ?>
		<?php echo $form->error($model,'dateoftr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'trtype'); ?>
		<?php echo $form->textField($model,'trtype',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'trtype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'trdetails'); ?>
		<?php echo $form->textArea($model,'trdetails',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'trdetails'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'trdoc'); ?>
		<?php echo $form->textField($model,'trdoc'); ?>
		<?php echo $form->error($model,'trdoc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->