<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('schemeid')); ?>:</b>
	<?php echo CHtml::encode(Schemes::model()->findByPk($data->schemeid)->name); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('from')); ?>:</b>
	<?php echo CHtml::encode(Designation::model()->findByPk($data->from)->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('to')); ?>:</b>
	<?php echo CHtml::encode($data->to); ?>
	<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />
	<b><?php echo CHtml::encode("Attachments:"); ?>:</b>
	<?php 
	$x=$data->attachments; 
	$y=explode(",",$x);
	echo "<ul>";
	for ($i=1;$i<sizeof($y);$i++){
	  $files=Files::model()->findByPk($y[$i]);
	  echo "<li>".CHtml::link($files->originalname,Ccontroller::createUrl('/files/file',array('id'=>$y[$i])));
	}
	echo "</ul>";
	
	?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('history')); ?>:</b>
	<?php echo CHtml::encode($data->history); ?>
	<br />

	*/ ?>

</div>