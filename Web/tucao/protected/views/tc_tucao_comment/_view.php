<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('COMMENT_ID')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->COMMENT_ID), array('view', 'id'=>$data->COMMENT_ID)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TUCAO_ID')); ?>:</b>
	<?php echo CHtml::encode($data->TUCAO_ID); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COMMENT_CONTENT')); ?>:</b>
	<?php echo CHtml::encode($data->COMMENT_CONTENT); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CREATE_TIME')); ?>:</b>
	<?php echo CHtml::encode($data->CREATE_TIME); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('COMMENT_USER')); ?>:</b>
	<?php echo CHtml::encode($data->COMMENT_USER); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('REPLY_COMMENT')); ?>:</b>
	<?php echo CHtml::encode($data->REPLY_COMMENT); ?>
	<br />


</div>