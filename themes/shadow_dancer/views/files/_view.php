<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('desc')); ?>:</b>
	<?php echo CHtml::encode($data->desc); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mimetype')); ?>:</b>
	<?php echo CHtml::encode($data->mimetype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('size')); ?>:</b>
	<?php echo CHtml::encode($data->size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('path')); ?>:</b>
	<?php echo CHtml::encode($data->path); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deleteAccess')); ?>:</b>
	<?php echo CHtml::encode($data->deleteAccess); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('updateAccess')); ?>:</b>
	<?php echo CHtml::encode($data->updateAccess); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('viewAccess')); ?>:</b>
	<?php echo CHtml::encode($data->viewAccess); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('originalname')); ?>:</b>
	<?php echo CHtml::encode($data->originalname); ?>
	<br />

	*/ ?>

</div>