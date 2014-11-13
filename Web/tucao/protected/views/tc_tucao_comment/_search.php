<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'COMMENT_ID'); ?>
		<?php echo $form->textField($model,'COMMENT_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TUCAO_ID'); ?>
		<?php echo $form->textField($model,'TUCAO_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COMMENT_CONTENT'); ?>
		<?php echo $form->textField($model,'COMMENT_CONTENT',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CREATE_TIME'); ?>
		<?php echo $form->textField($model,'CREATE_TIME'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COMMENT_USER'); ?>
		<?php echo $form->textField($model,'COMMENT_USER'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'REPLY_COMMENT'); ?>
		<?php echo $form->textField($model,'REPLY_COMMENT'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->