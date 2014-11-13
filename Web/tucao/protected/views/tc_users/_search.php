<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'USER_ID'); ?>
		<?php echo $form->textField($model,'USER_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'GENDER'); ?>
		<?php echo $form->textField($model,'GENDER'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NICK_NAME'); ?>
		<?php echo $form->textField($model,'NICK_NAME',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'REG_PHONE_NUM'); ?>
		<?php echo $form->textField($model,'REG_PHONE_NUM',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'REG_EMAIL'); ?>
		<?php echo $form->textField($model,'REG_EMAIL',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PASSWORD'); ?>
		<?php echo $form->passwordField($model,'PASSWORD',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LEVEL'); ?>
		<?php echo $form->textField($model,'LEVEL'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SCORE'); ?>
		<?php echo $form->textField($model,'SCORE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'USER_STATUS'); ?>
		<?php echo $form->textField($model,'USER_STATUS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DEFAULT_PIC'); ?>
		<?php echo $form->textField($model,'DEFAULT_PIC'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HEAD_PIC'); ?>
		<?php echo $form->textField($model,'HEAD_PIC',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CREATE_TIME'); ?>
		<?php echo $form->textField($model,'CREATE_TIME'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->