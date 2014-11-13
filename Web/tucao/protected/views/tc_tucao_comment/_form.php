<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tc-tucao-comment-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'TUCAO_ID'); ?>
		<?php echo $form->textField($model,'TUCAO_ID'); ?>
		<?php echo $form->error($model,'TUCAO_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'COMMENT_CONTENT'); ?>
		<?php echo $form->textField($model,'COMMENT_CONTENT',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'COMMENT_CONTENT'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CREATE_TIME'); ?>
		<?php echo $form->textField($model,'CREATE_TIME'); ?>
		<?php echo $form->error($model,'CREATE_TIME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'COMMENT_USER'); ?>
		<?php echo $form->textField($model,'COMMENT_USER'); ?>
		<?php echo $form->error($model,'COMMENT_USER'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'REPLY_COMMENT'); ?>
		<?php echo $form->textField($model,'REPLY_COMMENT'); ?>
		<?php echo $form->error($model,'REPLY_COMMENT'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->