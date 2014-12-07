<?php
$this->breadcrumbs=array(
	'Tucaos'=>array('index'),
	$model->TITLE,
);

$this->menu=array(
	array('label'=>'List Tucao', 'url'=>array('index')),
	array('label'=>'Create Tucao', 'url'=>array('create')),
	array('label'=>'Update Tucao', 'url'=>array('update', 'id'=>$model->TUCAO_ID)),
	array('label'=>'Delete Tucao', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->TUCAO_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tucao', 'url'=>array('admin')),
);
?>

<h1>View Tucao #<?php echo $model->TUCAO_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'TUCAO_ID',
		'TITLE',
		'CONTENT',
		'HAS_PIC',
		'SOURCE',
		'FATHER_ID',
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
	),
)); ?>
