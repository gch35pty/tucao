<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'PIC_ID'); ?>
		<?php echo $form->textField($model,'PIC_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'PIC_SRC'); ?>
		<?php echo $form->textField($model,'PIC_SRC',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SMALL_PIC_SRC'); ?>
		<?php echo $form->textField($model,'SMALL_PIC_SRC',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TUCAO_ID'); ?>
		<?php echo $form->textField($model,'TUCAO_ID'); ?>
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
		<?php echo $form->label($model,'LENGTH'); ?>
		<?php echo $form->textField($model,'LENGTH'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'WIDTH'); ?>
		<?php echo $form->textField($model,'WIDTH'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->