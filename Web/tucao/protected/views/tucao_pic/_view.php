<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('PIC_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->PIC_ID), array('view', 'id'=>$data->PIC_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('PIC_SRC')); ?>:</b>
	<?php echo CHtml::encode($data->PIC_SRC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('SMALL_PIC_SRC')); ?>:</b>
	<?php echo CHtml::encode($data->SMALL_PIC_SRC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TUCAO_ID')); ?>:</b>
	<?php echo CHtml::encode($data->TUCAO_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('USER_ID')); ?>:</b>
	<?php echo CHtml::encode($data->USER_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CREATE_TIME')); ?>:</b>
	<?php echo CHtml::encode($data->CREATE_TIME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LENGTH')); ?>:</b>
	<?php echo CHtml::encode($data->LENGTH); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('WIDTH')); ?>:</b>
	<?php echo CHtml::encode($data->WIDTH); ?>
	<br />

	*/ ?>

</div>