<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'TOPIC_ID'); ?>
		<?php echo $form->textField($model,'TOPIC_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TOPIC_TITLE'); ?>
		<?php echo $form->textField($model,'TOPIC_TITLE',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TOPIC_CONTENT'); ?>
		<?php echo $form->textArea($model,'TOPIC_CONTENT',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CREATE_TIME'); ?>
		<?php echo $form->textField($model,'CREATE_TIME'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'END_TIME'); ?>
		<?php echo $form->textField($model,'END_TIME'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HAS_PIC'); ?>
		<?php echo $form->textField($model,'HAS_PIC'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CREATE_USER'); ?>
		<?php echo $form->textField($model,'CREATE_USER'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LADTITUDE'); ?>
		<?php echo $form->textField($model,'LADTITUDE',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'LONGITUDE'); ?>
		<?php echo $form->textField($model,'LONGITUDE',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CITY'); ?>
		<?php echo $form->textField($model,'CITY',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'POSITION_DESC'); ?>
		<?php echo $form->textField($model,'POSITION_DESC',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->