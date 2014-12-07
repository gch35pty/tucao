<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('MESSAGE_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->MESSAGE_ID), array('view', 'id'=>$data->MESSAGE_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CONTENT')); ?>:</b>
	<?php echo CHtml::encode($data->CONTENT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CREATE_TIME')); ?>:</b>
	<?php echo CHtml::encode($data->CREATE_TIME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SEND_USER')); ?>:</b>
	<?php echo CHtml::encode($data->SEND_USER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('RECEIVE_USER')); ?>:</b>
	<?php echo CHtml::encode($data->RECEIVE_USER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MESSAGE_STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->MESSAGE_STATUS); ?>
	<br />


</div>