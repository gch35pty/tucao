<?php
$this->breadcrumbs=array(
	'Users Relations'=>array('index'),
	$model->ID,
);

$this->menu=array(
	array('label'=>'List Users_relation', 'url'=>array('index')),
	array('label'=>'Create Users_relation', 'url'=>array('create')),
	array('label'=>'Update Users_relation', 'url'=>array('update', 'id'=>$model->ID)),
	array('label'=>'Delete Users_relation', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Users_relation', 'url'=>array('admin')),
);
?>

<h1>View Users_relation #<?php echo $model->ID; ?></h1>

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
