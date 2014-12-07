<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('TOPIC_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->TOPIC_ID), array('view', 'id'=>$data->TOPIC_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TOPIC_TITLE')); ?>:</b>
	<?php echo CHtml::encode($data->TOPIC_TITLE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TOPIC_CONTENT')); ?>:</b>
	<?php echo CHtml::encode($data->TOPIC_CONTENT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CREATE_TIME')); ?>:</b>
	<?php echo CHtml::encode($data->CREATE_TIME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('END_TIME')); ?>:</b>
	<?php echo CHtml::encode($data->END_TIME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HAS_PIC')); ?>:</b>
	<?php echo CHtml::encode($data->HAS_PIC); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CREATE_USER')); ?>:</b>
	<?php echo CHtml::encode($data->CREATE_USER); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('LADTITUDE')); ?>:</b>
	<?php echo CHtml::encode($data->LADTITUDE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('LONGITUDE')); ?>:</b>
	<?php echo CHtml::encode($data->LONGITUDE); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CITY')); ?>:</b>
	<?php echo CHtml::encode($data->CITY); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('POSITION_DESC')); ?>:</b>
	<?php echo CHtml::encode($data->POSITION_DESC); ?>
	<br />

	*/ ?>

</div>