<?php
$this->breadcrumbs=array(
	'Tc Users Relations'=>array('index'),
	$model->ID,
);

$this->menu=array(
	array('label'=>'List tc_users_relation', 'url'=>array('index')),
	array('label'=>'Create tc_users_relation', 'url'=>array('create')),
	array('label'=>'Update tc_users_relation', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete tc_users_relation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage tc_users_relation', 'url'=>array('admin')),
);
?>

<h1>View tc_users_relation #<?php echo $model->ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ID',
		'USER_ID',
		'ATTENTION_USER_ID',
		'CREATE_TIME',
		'ATTENTION_STATUS',
	),
)); ?>
