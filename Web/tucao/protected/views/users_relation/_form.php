<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-relation-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'USER_ID'); ?>
		<?php echo $form->textField($model,'USER_ID'); ?>
		<?php echo $form->error($model,'USER_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ATTENTION_USER_ID'); ?>
		<?php echo $form->textField($model,'ATTENTION_USER_ID'); ?>
		<?php echo $form->error($model,'ATTENTION_USER_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CREATE_TIME'); ?>
		<?php echo $form->textField($model,'CREATE_TIME'); ?>
		<?php echo $form->error($model,'CREATE_TIME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ATTENTION_STATUS'); ?>
		<?php echo $form->textField($model,'ATTENTION_STATUS'); ?>
		<?php echo $form->error($model,'ATTENTION_STATUS'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->