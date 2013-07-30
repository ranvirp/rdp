<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'excel-import-form',
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

<div class="row">
		<?php echo CHtml::label('Modeclass:',false); ?>
		<?php echo CHtml::textField('modelclass');?>
		<?php echo CHtml::label('rowbegin:',false); ?>
		<?php echo CHtml::textField('rowbegin');?>
		
		<?php echo CHtml::label('rowend:',false); ?>
		<?php echo CHtml::textField('rowend');?>
		
		
	</div>
	<div class="row">
		<?php echo CHtml::label('Map:',false); ?>
		<?php echo CHtml::textArea('map','{"field1":2,"field2":3,"field3":{"col":4,"model":"district","attr":"name","field":"id"}}');
		//format:{"rowbegin"=>2,"rowend"=>4,"field1":2,"field2":3,"field3":{"col":4,"model":"district","attr":"name","field":"id"}}
		
		?>
	</div>

	

	
	<div class="row">
	<?php echo CHtml::hiddenField('attachments');?>
		</div>
<div class="row buttons">
		<?php echo CHtml::ajaxSubmitButton("Save","",
		array('dataType'=>'json',
		'success'=>"function(data)
                {
				if (!data.redirect){
                    // Update the status
                    $('#result').html(data.html);
					}
				else {
				alert(data.redirect);
				   window.location.replace(data.redirect);
				   }
                    
 
                } "),array("style"=>"visibility:hidden","id"=>"st1")); ?>
	</div>

	<?php $this->endWidget(); ?>
</div><!-- form -->
<div id='result'></div>
	
<?php
$this->widget('ext.jquery_upload.EFileUpload');
?>

<div class="row buttons">
		<?php echo CHtml::submitButton('Save'); ?>
	</div>

<script>
$(document).ready(
$("input[name=yt1]").click(function(){
$('input#attachments').val(" ");
$('table.files .file').each(function(){
var x = $(this).attr("href").match(/\/(\d+)$/)[1];
var y =$('input#attachments').val();
//alert(y);
$('#attachments').val(y+","+x);
});
//alert($('#attachments').val());
$('#st1').click();

})
);
</script>