<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'MESSAGE_ID'); ?>
		<?php echo $form->textField($model,'MESSAGE_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CONTENT'); ?>
		<?php echo $form->textField($model,'CONTENT',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CREATE_TIME'); ?>
		<?php echo $form->textField($model,'CREATE_TIME'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SEND_USER'); ?>
		<?php echo $form->textField($model,'SEND_USER'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'RECEIVE_USER'); ?>
		<?php echo $form->textField($model,'RECEIVE_USER'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MESSAGE_STATUS'); ?>
		<?php echo $form->textField($model,'MESSAGE_STATUS'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->