<?php
$this->breadcrumbs=array(
	'Tc Tucaos'=>array('index'),
	$model->TITLE,
);

$this->menu=array(
	array('label'=>'List tc_tucao', 'url'=>array('index')),
	array('label'=>'Create tc_tucao', 'url'=>array('create')),
	array('label'=>'Update tc_tucao', 'url'=>array('update', 'id'=>$model->TC_TUCAO)),
	array('label'=>'Delete tc_tucao', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->TC_TUCAO),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage tc_tucao', 'url'=>array('admin')),
);
?>

<h1>View tc_tucao #<?php echo $model->TC_TUCAO; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'TC_TUCAO',
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
