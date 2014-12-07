<?php
$this->breadcrumbs=array(
	'Shares'=>array('index'),
	$model->SHARE_ID,
);

$this->menu=array(
	array('label'=>'List Share', 'url'=>array('index')),
	array('label'=>'Create Share', 'url'=>array('create')),
	array('label'=>'Update Share', 'url'=>array('update', 'id'=>$model->SHARE_ID)),
	array('label'=>'Delete Share', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->SHARE_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Share', 'url'=>array('admin')),
);
?>

<h1>View Share #<?php echo $model->SHARE_ID; ?></h1>

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
