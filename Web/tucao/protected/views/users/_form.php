<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'GENDER'); ?>
		<?php echo $form->textField($model,'GENDER'); ?>
		<?php echo $form->error($model,'GENDER'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'NICK_NAME'); ?>
		<?php echo $form->textField($model,'NICK_NAME',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'NICK_NAME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'REG_PHONE_NUM'); ?>
		<?php echo $form->textField($model,'REG_PHONE_NUM',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'REG_PHONE_NUM'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'REG_EMAIL'); ?>
		<?php echo $form->textField($model,'REG_EMAIL',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'REG_EMAIL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'PASSWORD'); ?>
		<?php echo $form->passwordField($model,'PASSWORD',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'PASSWORD'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LEVEL'); ?>
		<?php echo $form->textField($model,'LEVEL'); ?>
		<?php echo $form->error($model,'LEVEL'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SCORE'); ?>
		<?php echo $form->textField($model,'SCORE'); ?>
		<?php echo $form->error($model,'SCORE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'USER_STATUS'); ?>
		<?php echo $form->textField($model,'USER_STATUS'); ?>
		<?php echo $form->error($model,'USER_STATUS'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DEFAULT_PIC'); ?>
		<?php echo $form->textField($model,'DEFAULT_PIC'); ?>
		<?php echo $form->error($model,'DEFAULT_PIC'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'HEAD_PIC'); ?>
		<?php echo $form->textField($model,'HEAD_PIC',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'HEAD_PIC'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CREATE_TIME'); ?>
		<?php echo $form->textField($model,'CREATE_TIME'); ?>
		<?php echo $form->error($model,'CREATE_TIME'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->