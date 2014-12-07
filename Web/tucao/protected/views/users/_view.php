<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->USER_ID), array('view', 'id'=>$data->USER_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('GENDER')); ?>:</b>
	<?php echo CHtml::encode($data->GENDER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NICK_NAME')); ?>:</b>
	<?php echo CHtml::encode($data->NICK_NAME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('REG_PHONE_NUM')); ?>:</b>
	<?php echo CHtml::encode($data->REG_PHONE_NUM); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('REG_EMAIL')); ?>:</b>
	<?php echo CHtml::encode($data->REG_EMAIL); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PASSWORD')); ?>:</b>
	<?php echo CHtml::encode($data->PASSWORD); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LEVEL')); ?>:</b>
	<?php echo CHtml::encode($data->LEVEL); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('SCORE')); ?>:</b>
	<?php echo CHtml::encode($data->SCORE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_STATUS')); ?>:</b>
	<?php echo CHtml::encode($data->USER_STATUS); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DEFAULT_PIC')); ?>:</b>
	<?php echo CHtml::encode($data->DEFAULT_PIC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HEAD_PIC')); ?>:</b>
	<?php echo CHtml::encode($data->HEAD_PIC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CREATE_TIME')); ?>:</b>
	<?php echo CHtml::encode($data->CREATE_TIME); ?>
	<br />

	*/ ?>

</div>