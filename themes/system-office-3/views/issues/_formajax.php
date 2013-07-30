
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'issues-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array('validateOnChange'=>false,'validateOnSubmit'=>TRUE,'afterValidate'=>'js:function(form, data, hasError) {
	alert(\'hi\')
            if(jQuery.isEmptyObject(data)) {
                alert("ok")
            } else{
			alert(data)
			}
            return false;
        }'
),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php 
	foreach(Designation_types::model()->findAll() as $model1){

    $listData[$model1->id]=$model1->name;
	
	}
	$from = Designation::model()->findByAttributes(array('user'=>Yii::app()->user->id))->id;

	?>
	<div class="row">
		<?php echo CHtml::label('Scheme:',false); ?>
		<?php echo $form->dropDownList($model,'schemeid',CHtml::listData(Schemes::model()->findAll(),'id','name'),array('empty'=>'Select Scheme'));?>
		<?php echo $form->error($model,'schemeid'); ?>
	

	
	
	<?php echo $form->hiddenField($model,'from',array('value'=>$from));?>
		
	
		<?php echo $form->labelEx($model,'to'); ?>
		
		<?php echo CHtml::dropDownList("designation_type",'',$listData,
		array(
		'ajax'=>array(
		'type'=>'POST',
		'url'=>CController::createUrl('issues/getLevelDetails'),
		//'data'=>'js:jQuery(this).parents("form").serialize()',
		'update'=>'#Issues_to',
		),
		
		));?>
		<?php echo $form->dropDownList($model,'to',array());?>
	<?php echo $form->error($model,'to',""); ?>
	</div>
<div class="row">
<?php echo "Subject:" ?>
<?php echo $form->dropDownList($model,'tagid',CHtml::listData(Tags::model()->findAllByAttributes(array('schemeid'=>1)),'id','tag'),array('0'=>'Others'));?>
	<?php echo $form->error($model,'tagid'); ?>
	

</div>
	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
	<?php echo $form->hiddenField($model,'attachments',array('value'=>""));?>
		</div>
<div class="row buttons">
		<?php echo CHtml::ajaxSubmitButton("Save","",
		array('dataType'=>'json',
		'success'=>"function(data)
                {
				if (!data.redirect){
                    // Update the status
                    $('.form').html(data.html);
					}
				else {
				alert(data.redirect);
				   window.location.replace(data.redirect);
				   }
                    
 
                } "),array("style"=>"visibility:hidden","id"=>"st1")); ?>
	</div>

	<?php $this->endWidget(); ?>
	
