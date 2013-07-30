<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'works-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'bwid'); ?>
		<?php echo $form->textField($model,'bwid',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'bwid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textArea($model,'name',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'finyear'); ?>
		<?php echo $form->textField($model,'finyear',array('size'=>7,'maxlength'=>7)); ?>
		<?php echo $form->error($model,'finyear'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'amount'); ?>
		<?php echo $form->textField($model,'amount'); ?>
		<?php echo $form->error($model,'amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'schemecode'); ?>
		<?php echo $form->textField($model,'schemecode',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'schemecode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'agencycode'); ?>
		<?php echo $form->textField($model,'agencycode',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'agencycode'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->