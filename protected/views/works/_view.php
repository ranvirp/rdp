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

	<b><?php echo CHtml::encode($data->getAttributeLabel('finyear')); ?>:</b>
	<?php echo CHtml::encode($data->finyear); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amount')); ?>:</b>
	<?php echo CHtml::encode($data->amount); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('schemecode')); ?>:</b>
	<?php echo CHtml::encode($data->schemecode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('agencycode')); ?>:</b>
	<?php echo CHtml::encode($data->agencycode); ?>
	<br />


</div>