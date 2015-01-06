<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('SUPPORT_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->SUPPORT_ID), array('view', 'id'=>$data->SUPPORT_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COMMENT_ID')); ?>:</b>
	<?php echo CHtml::encode($data->COMMENT_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SUPPORT_STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->SUPPORT_STATUS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_ID')); ?>:</b>
	<?php echo CHtml::encode($data->USER_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CREATE_TIME')); ?>:</b>
	<?php echo CHtml::encode($data->CREATE_TIME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->STATUS); ?>
	<br />


</div>