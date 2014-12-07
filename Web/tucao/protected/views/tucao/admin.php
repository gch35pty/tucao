<?php
$this->breadcrumbs=array(
	'Tucaos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Tucao', 'url'=>array('index')),
	array('label'=>'Create Tucao', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tucao-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tucaos</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tucao-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'TUCAO_ID',
		'TITLE',
		'CONTENT',
		'HAS_PIC',
		'SOURCE',
		'FATHER_ID',
		/*
		'TOPIC_ID',
		'COMMENT_NUM',
		'SUPPORT_NUM',
		'SHARE_NUM',
		'CREATE_TIME',
		'IS_ANONYMOUS',
		'USER_ID',
		'LADTITUDE',
		'LONGITUDE',
		'CITY',
		'POSITION_DESC',
		'TUCAO_STATUS',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
