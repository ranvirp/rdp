<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'districtcode'); ?>
		<?php echo $form->textField($model,'districtcode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'hqr'); ?>
		<?php echo $form->textArea($model,'hqr',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'loc'); ?>
		<?php echo $form->textField($model,'loc',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tehsils'); ?>
		<?php echo $form->textField($model,'tehsils'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'blocks'); ?>
		<?php echo $form->textField($model,'blocks'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'revvill'); ?>
		<?php echo $form->textField($model,'revvill'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'panchayats'); ?>
		<?php echo $form->textField($model,'panchayats'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'area'); ?>
		<?php echo $form->textField($model,'area'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->