<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'share-form',
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
		<?php echo $form->labelEx($model,'TUCAO_ID'); ?>
		<?php echo $form->textField($model,'TUCAO_ID'); ?>
		<?php echo $form->error($model,'TUCAO_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'USER_ID'); ?>
		<?php echo $form->textField($model,'USER_ID'); ?>
		<?php echo $form->error($model,'USER_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SHARE_DEST'); ?>
		<?php echo $form->textField($model,'SHARE_DEST'); ?>
		<?php echo $form->error($model,'SHARE_DEST'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SHARE_STATUS'); ?>
		<?php echo $form->textField($model,'SHARE_STATUS'); ?>
		<?php echo $form->error($model,'SHARE_STATUS'); ?>
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