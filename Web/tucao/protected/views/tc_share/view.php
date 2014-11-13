<?php
$this->breadcrumbs=array(
	'Tc Shares'=>array('index'),
	$model->SHARE_ID,
);

$this->menu=array(
	array('label'=>'List tc_share', 'url'=>array('index')),
	array('label'=>'Create tc_share', 'url'=>array('create')),
	array('label'=>'Update tc_share', 'url'=>array('update', 'id'=>$model->SHARE_ID)),
	array('label'=>'Delete tc_share', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->SHARE_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage tc_share', 'url'=>array('admin')),
);
?>

<h1>View tc_share #<?php echo $model->SHARE_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'SHARE_ID',
		'CONTENT',
		'TUCAO_ID',
		'USER_ID',
		'SHARE_DEST',
		'SHARE_STATUS',
		'CREATE_TIME',
	),
)); ?>
