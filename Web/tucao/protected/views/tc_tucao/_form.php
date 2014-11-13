<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tc-tucao-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'TITLE'); ?>
		<?php echo $form->textField($model,'TITLE',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'TITLE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CONTENT'); ?>
		<?php echo $form->textArea($model,'CONTENT',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'CONTENT'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'HAS_PIC'); ?>
		<?php echo $form->textField($model,'HAS_PIC'); ?>
		<?php echo $form->error($model,'HAS_PIC'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SOURCE'); ?>
		<?php echo $form->textField($model,'SOURCE'); ?>
		<?php echo $form->error($model,'SOURCE'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FATHER_ID'); ?>
		<?php echo $form->textField($model,'FATHER_ID'); ?>
		<?php echo $form->error($model,'FATHER_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TOPIC_ID'); ?>
		<?php echo $form->textField($model,'TOPIC_ID'); ?>
		<?php echo $form->error($model,'TOPIC_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'COMMENT_NUM'); ?>
		<?php echo $form->textField($model,'COMMENT_NUM'); ?>
		<?php echo $form->error($model,'COMMENT_NUM'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SUPPORT_NUM'); ?>
		<?php echo $form->textField($model,'SUPPORT_NUM'); ?>
		<?php echo $form->error($model,'SUPPORT_NUM'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'SHARE_NUM'); ?>
		<?php echo $form->textField($model,'SHARE_NUM'); ?>
		<?php echo $form->error($model,'SHARE_NUM'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CREATE_TIME'); ?>
		<?php echo $form->textField($model,'CREATE_TIME'); ?>
		<?php echo $form->error($model,'CREATE_TIME'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'IS_ANONYMOUS'); ?>
		<?php echo $form->textField($model,'IS_ANONYMOUS'); ?>
		<?php echo $form->error($model,'IS_ANONYMOUS'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'USER_ID'); ?>
		<?php echo $form->textField($model,'USER_ID'); ?>
		<?php echo $form->error($model,'USER_ID'); ?>
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

	<div class="row">
		<?php echo $form->labelEx($model,'TUCAO_STATUS'); ?>
		<?php echo $form->textField($model,'TUCAO_STATUS'); ?>
		<?php echo $form->error($model,'TUCAO_STATUS'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->