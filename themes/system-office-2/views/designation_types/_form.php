<div class="form">
<script>
	google.load("elements", "1", {
            packages: "transliteration"
          });

	function onLoad() {
  var options = {
    sourceLanguage: 'en',
    destinationLanguage: ['hi'],
    shortcutKey: 'ctrl+g',
    transliterationEnabled: true
  };

  // Create an instance on TransliterationControl with the required
  // options.
  var control = new google.elements.transliteration.TransliterationControl(options);
  //control.enableTransliteration();
  var ids = [ "Designation_types_name" ];
        control.makeTransliteratable(ids);

  
}
	
	</script>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'designation-types-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php 
		echo $form->labelEx($model,'name'); 
		?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255,'class'=>'googlify')); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php 
		echo $form->labelEx($model,'level'); 
		?>
		<?php echo $form->dropDownList($model,'level',array('district'=>'District','department'=>'Department','govt'=>'Government')); ?>
		<?php echo $form->error($model,'level'); ?>
	</div>

	<div class="row">
		<?php 
		echo $form->labelEx($model,'dept_id'); 
		?>
		<?php echo $form->dropDownList($model,'dept_id',CHtml::listData(Department::model()->findAll(),'id','name'),array('empty'=>'Select department'));?>
		<?php echo $form->error($model,'dept_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->