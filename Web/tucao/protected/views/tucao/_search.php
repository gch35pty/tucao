<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'TUCAO_ID'); ?>
		<?php echo $form->textField($model,'TUCAO_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TITLE'); ?>
		<?php echo $form->textField($model,'TITLE',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CONTENT'); ?>
		<?php echo $form->textArea($model,'CONTENT',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HAS_PIC'); ?>
		<?php echo $form->textField($model,'HAS_PIC'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SOURCE'); ?>
		<?php echo $form->textField($model,'SOURCE'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FATHER_ID'); ?>
		<?php echo $form->textField($model,'FATHER_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'TOPIC_ID'); ?>
		<?php echo $form->textField($model,'TOPIC_ID'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'COMMENT_NUM'); ?>
		<?php echo $form->textField($model,'COMMENT_NUM'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SUPPORT_NUM'); ?>
		<?php echo $form->textField($model,'SUPPORT_NUM'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'SHARE_NUM'); ?>
		<?php echo $form->textField($model,'SHARE_NUM'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CREATE_TIME'); ?>
		<?php echo $form->textField($model,'CREATE_TIME'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'IS_ANONYMOUS'); ?>
		<?php echo $form->textField($model,'IS_ANONYMOUS'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'USER_ID'); ?>
		<?php echo $form->textField($model,'USER_ID'); ?>
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

	<div class="row">
		<?php echo $form->label($model,'TUCAO_STATUS'); ?>
		<?php echo $form->textField($model,'TUCAO_STATUS'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->