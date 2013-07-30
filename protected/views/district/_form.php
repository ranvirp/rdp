<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'district-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'districtcode'); ?>
		<?php echo $form->textField($model,'districtcode'); ?>
		<?php echo $form->error($model,'districtcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hqr'); ?>
		<?php echo $form->textArea($model,'hqr',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'hqr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'loc'); ?>
		<?php echo $form->textField($model,'loc',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'loc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tehsils'); ?>
		<?php echo $form->textField($model,'tehsils'); ?>
		<?php echo $form->error($model,'tehsils'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'blocks'); ?>
		<?php echo $form->textField($model,'blocks'); ?>
		<?php echo $form->error($model,'blocks'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'revvill'); ?>
		<?php echo $form->textField($model,'revvill'); ?>
		<?php echo $form->error($model,'revvill'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'panchayats'); ?>
		<?php echo $form->textField($model,'panchayats'); ?>
		<?php echo $form->error($model,'panchayats'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'area'); ?>
		<?php echo $form->textField($model,'area'); ?>
		<?php echo $form->error($model,'area'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->