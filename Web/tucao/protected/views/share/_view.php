<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('SHARE_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->SHARE_ID), array('view', 'id'=>$data->SHARE_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CONTENT')); ?>:</b>
	<?php echo CHtml::encode($data->CONTENT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TUCAO_ID')); ?>:</b>
	<?php echo CHtml::encode($data->TUCAO_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_ID')); ?>:</b>
	<?php echo CHtml::encode($data->USER_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SHARE_DEST')); ?>:</b>
	<?php echo CHtml::encode($data->SHARE_DEST); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SHARE_STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->SHARE_STATUS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CREATE_TIME')); ?>:</b>
	<?php echo CHtml::encode($data->CREATE_TIME); ?>
	<br />


</div>