<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usertask_id')); ?>:</b>
	<?php echo CHtml::encode($data->usertask_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('submittedreport')); ?>:</b>
	<?php echo CHtml::encode($data->submittedreport); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('author_id')); ?>:</b>
	<?php echo CHtml::encode($data->author_id); ?>
	<br />


</div>