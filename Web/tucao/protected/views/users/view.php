<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->USER_ID,
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'Update Users', 'url'=>array('update', 'id'=>$model->USER_ID)),
	array('label'=>'Delete Users', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->USER_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<h1>View Users #<?php echo $model->USER_ID; ?></h1>

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
