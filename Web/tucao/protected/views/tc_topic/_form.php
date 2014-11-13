<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tc-topic-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'TOPIC_TITLE'); ?>
		<?php echo $form->textField($model,'TOPIC_TITLE',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'TOPIC_TITLE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TOPIC_CONTENT'); ?>
		<?php echo $form->textArea($model,'TOPIC_CONTENT',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'TOPIC_CONTENT'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CREATE_TIME'); ?>
		<?php echo $form->textField($model,'CREATE_TIME'); ?>
		<?php echo $form->error($model,'CREATE_TIME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'END_TIME'); ?>
		<?php echo $form->textField($model,'END_TIME'); ?>
		<?php echo $form->error($model,'END_TIME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'HAS_PIC'); ?>
		<?php echo $form->textField($model,'HAS_PIC'); ?>
		<?php echo $form->error($model,'HAS_PIC'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CREATE_USER'); ?>
		<?php echo $form->textField($model,'CREATE_USER'); ?>
		<?php echo $form->error($model,'CREATE_USER'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LADTITUDE'); ?>
		<?php echo $form->textField($model,'LADTITUDE',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'LADTITUDE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'LONGITUDE'); ?>
		<?php echo $form->textField($model,'LONGITUDE',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'LONGITUDE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CITY'); ?>
		<?php echo $form->textField($model,'CITY',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'CITY'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'POSITION_DESC'); ?>
		<?php echo $form->textField($model,'POSITION_DESC',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'POSITION_DESC'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->