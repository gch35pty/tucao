<?php
$this->breadcrumbs=array(
	'Tc Tucao Comments'=>array('index'),
	$model->COMMENT_ID,
);

$this->menu=array(
	array('label'=>'List tc_tucao_comment', 'url'=>array('index')),
	array('label'=>'Create tc_tucao_comment', 'url'=>array('create')),
	array('label'=>'Update tc_tucao_comment', 'url'=>array('update', 'id'=>$model->COMMENT_ID)),
	array('label'=>'Delete tc_tucao_comment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->COMMENT_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage tc_tucao_comment', 'url'=>array('admin')),
);
?>

<h1>View tc_tucao_comment #<?php echo $model->COMMENT_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'COMMENT_ID',
		'TUCAO_ID',
		'COMMENT_CONTENT',
		'CREATE_TIME',
		'COMMENT_USER',
		'REPLY_COMMENT',
	),
)); ?>
