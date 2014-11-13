<?php
$this->breadcrumbs=array(
	'Tc Users'=>array('index'),
	$model->USER_ID,
);

$this->menu=array(
	array('label'=>'List tc_users', 'url'=>array('index')),
	array('label'=>'Create tc_users', 'url'=>array('create')),
	array('label'=>'Update tc_users', 'url'=>array('update', 'id'=>$model->USER_ID)),
	array('label'=>'Delete tc_users', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->USER_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage tc_users', 'url'=>array('admin')),
);
?>

<h1>View tc_users #<?php echo $model->USER_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'USER_ID',
		'GENDER',
		'NICK_NAME',
		'REG_PHONE_NUM',
		'REG_EMAIL',
		'PASSWORD',
		'LEVEL',
		'SCORE',
		'USER_STATUS',
		'DEFAULT_PIC',
		'HEAD_PIC',
		'CREATE_TIME',
	),
)); ?>
