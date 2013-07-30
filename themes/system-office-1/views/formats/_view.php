<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('schemeid')); ?>:</b>
	<?php echo CHtml::encode($data->schemeid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('formatfile_id')); ?>:</b>
	<?php echo CHtml::encode($data->formatfile_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('xsd')); ?>:</b>
	<?php echo CHtml::encode($data->xsd); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('xml')); ?>:</b>
	<?php echo CHtml::encode($data->xml); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('aggregator')); ?>:</b>
	<?php echo CHtml::encode($data->aggregator); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('periodicity')); ?>:</b>
	<?php echo CHtml::encode($data->periodicity); ?>
	<br />

	*/ ?>

</div>