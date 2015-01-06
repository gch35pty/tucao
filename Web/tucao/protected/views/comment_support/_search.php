<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'SUPPORT_ID'); ?>
		<?php echo $form->textField($model,'SUPPORT_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COMMENT_ID'); ?>
		<?php echo $form->textField($model,'COMMENT_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SUPPORT_STATUS'); ?>
		<?php echo $form->textField($model,'SUPPORT_STATUS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'USER_ID'); ?>
		<?php echo $form->textField($model,'USER_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CREATE_TIME'); ?>
		<?php echo $form->textField($model,'CREATE_TIME'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'STATUS'); ?>
		<?php echo $form->textField($model,'STATUS'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->