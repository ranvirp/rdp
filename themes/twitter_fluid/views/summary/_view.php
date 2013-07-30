<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('schemeid')); ?>:</b>
	<?php echo CHtml::encode($data->schemeid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('allottment')); ?>:</b>
	<?php echo CHtml::encode($data->allottment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('received')); ?>:</b>
	<?php echo CHtml::encode($data->received); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('allotcentral')); ?>:</b>
	<?php echo CHtml::encode($data->allotcentral); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('allotstate')); ?>:</b>
	<?php echo CHtml::encode($data->allotstate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('receivedstate')); ?>:</b>
	<?php echo CHtml::encode($data->receivedstate); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('receivedcentral')); ?>:</b>
	<?php echo CHtml::encode($data->receivedcentral); ?>
	<br />

	*/ ?>

</div>