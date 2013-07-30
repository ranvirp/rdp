<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('schemeid')); ?>:</b>
	<?php echo CHtml::encode($data->schemeid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('from')); ?>:</b>
	<?php echo CHtml::encode($data->from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('to')); ?>:</b>
	<?php echo CHtml::encode($data->to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateoftr')); ?>:</b>
	<?php echo CHtml::encode($data->dateoftr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trtype')); ?>:</b>
	<?php echo CHtml::encode($data->trtype); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('trdetails')); ?>:</b>
	<?php echo CHtml::encode($data->trdetails); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('trdoc')); ?>:</b>
	<?php echo CHtml::encode($data->trdoc); ?>
	<br />

	*/ ?>

</div>