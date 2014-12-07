<?php
$this->breadcrumbs=array(
	'Messages'=>array('index'),
	$model->MESSAGE_ID,
);

$this->menu=array(
	array('label'=>'List message', 'url'=>array('index')),
	array('label'=>'Create message', 'url'=>array('create')),
	array('label'=>'Update message', 'url'=>array('update', 'id'=>$model->MESSAGE_ID)),
	array('label'=>'Delete message', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->MESSAGE_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage message', 'url'=>array('admin')),
);
?>

<h1>View message #<?php echo $model->MESSAGE_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'MESSAGE_ID',
		'CONTENT',
		'CREATE_TIME',
		'SEND_USER',
		'RECEIVE_USER',
		'MESSAGE_STATUS',
	),
)); ?>
