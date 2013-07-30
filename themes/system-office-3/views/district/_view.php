<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('districtcode')); ?>:</b>
	<?php echo CHtml::encode($data->districtcode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('hqr')); ?>:</b>
	<?php echo CHtml::encode($data->hqr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('loc')); ?>:</b>
	<?php echo CHtml::encode($data->loc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tehsils')); ?>:</b>
	<?php echo CHtml::encode($data->tehsils); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('blocks')); ?>:</b>
	<?php echo CHtml::encode($data->blocks); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('revvill')); ?>:</b>
	<?php echo CHtml::encode($data->revvill); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('panchayats')); ?>:</b>
	<?php echo CHtml::encode($data->panchayats); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area')); ?>:</b>
	<?php echo CHtml::encode($data->area); ?>
	<br />

	*/ ?>

</div>