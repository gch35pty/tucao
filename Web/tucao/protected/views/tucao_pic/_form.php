<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tucao-pic-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'PIC_SRC'); ?>
		<?php echo $form->textField($model,'PIC_SRC',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'PIC_SRC'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SMALL_PIC_SRC'); ?>
		<?php echo $form->textField($model,'SMALL_PIC_SRC',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'SMALL_PIC_SRC'); ?>
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
		<?php echo $form->labelEx($model,'CREATE_TIME'); ?>
		<?php echo $form->textField($model,'CREATE_TIME'); ?>
		<?php echo $form->error($model,'CREATE_TIME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LENGTH'); ?>
		<?php echo $form->textField($model,'LENGTH'); ?>
		<?php echo $form->error($model,'LENGTH'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'WIDTH'); ?>
		<?php echo $form->textField($model,'WIDTH'); ?>
		<?php echo $form->error($model,'WIDTH'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->