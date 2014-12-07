<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ID), array('view', 'id'=>$data->ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_ID')); ?>:</b>
	<?php echo CHtml::encode($data->USER_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ATTENTION_USER_ID')); ?>:</b>
	<?php echo CHtml::encode($data->ATTENTION_USER_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CREATE_TIME')); ?>:</b>
	<?php echo CHtml::encode($data->CREATE_TIME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ATTENTION_STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->ATTENTION_STATUS); ?>
	<br />


</div>