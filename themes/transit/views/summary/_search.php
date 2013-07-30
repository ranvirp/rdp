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
		<?php echo $form->label($model,'schemeid'); ?>
		<?php echo $form->textField($model,'schemeid'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'allottment'); ?>
		<?php echo $form->textField($model,'allottment'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'received'); ?>
		<?php echo $form->textField($model,'received'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'allotcentral'); ?>
		<?php echo $form->textField($model,'allotcentral'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'allotstate'); ?>
		<?php echo $form->textField($model,'allotstate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'receivedstate'); ?>
		<?php echo $form->textField($model,'receivedstate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'receivedcentral'); ?>
		<?php echo $form->textField($model,'receivedcentral'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->