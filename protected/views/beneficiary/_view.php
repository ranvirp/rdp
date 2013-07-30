<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bwid')); ?>:</b>
	<?php echo CHtml::encode($data->bwid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('father')); ?>:</b>
	<?php echo CHtml::encode($data->father); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('husband')); ?>:</b>
	<?php echo CHtml::encode($data->husband); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dob')); ?>:</b>
	<?php echo CHtml::encode($data->dob); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('age')); ?>:</b>
	<?php echo CHtml::encode($data->age); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('ason')); ?>:</b>
	<?php echo CHtml::encode($data->ason); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('religion')); ?>:</b>
	<?php echo CHtml::encode($data->religion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('caste')); ?>:</b>
	<?php echo CHtml::encode($data->caste); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('castename')); ?>:</b>
	<?php echo CHtml::encode($data->castename); ?>
	<br />

	*/ ?>

</div>