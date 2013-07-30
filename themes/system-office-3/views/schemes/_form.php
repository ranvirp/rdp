<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'schemes-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
	<?php echo $form->labelEx($model,'parentid'); ?>
		
	<?php echo $form->dropDownList($model,'parentid', 
	CHtml::listData(Schemes::model()->findAll("",array('order' => 'value ASC')), 'id', 'name'), array('empty'=>'Select parent Scheme')) ?>
		<?php echo $form->error($model,'parentid'); ?>
	</div>
	

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textArea($model,'name',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'depid'); ?>
		
	<?php echo $form->dropDownList($model,'depid', 
	CHtml::listData(Department::model()->findAll("",array('order' => 'value ASC')), 'id', 'name'), array('empty'=>'Select Department')) ?>
	<?php echo $form->error($model,'depid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'admin'); ?>
		<?php echo $form->dropDownList($model,'admin', 
	CHtml::listData(User::model()->findAll("",array('order' => 'value ASC')), 'id', 'username'), array('empty'=>'Select User')) ?>
	<?php echo $form->error($model,'admin'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->