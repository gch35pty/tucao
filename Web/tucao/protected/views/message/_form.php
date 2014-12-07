<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'message-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'CONTENT'); ?>
		<?php echo $form->textField($model,'CONTENT',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'CONTENT'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CREATE_TIME'); ?>
		<?php echo $form->textField($model,'CREATE_TIME'); ?>
		<?php echo $form->error($model,'CREATE_TIME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SEND_USER'); ?>
		<?php echo $form->textField($model,'SEND_USER'); ?>
		<?php echo $form->error($model,'SEND_USER'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'RECEIVE_USER'); ?>
		<?php echo $form->textField($model,'RECEIVE_USER'); ?>
		<?php echo $form->error($model,'RECEIVE_USER'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'MESSAGE_STATUS'); ?>
		<?php echo $form->textField($model,'MESSAGE_STATUS'); ?>
		<?php echo $form->error($model,'MESSAGE_STATUS'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->