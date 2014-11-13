<?php
$this->breadcrumbs=array(
	'Tc Topics'=>array('index'),
	$model->TOPIC_ID,
);

$this->menu=array(
	array('label'=>'List tc_topic', 'url'=>array('index')),
	array('label'=>'Create tc_topic', 'url'=>array('create')),
	array('label'=>'Update tc_topic', 'url'=>array('update', 'id'=>$model->TOPIC_ID)),
	array('label'=>'Delete tc_topic', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->TOPIC_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage tc_topic', 'url'=>array('admin')),
);
?>

<h1>View tc_topic #<?php echo $model->TOPIC_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'TOPIC_ID',
		'TOPIC_TITLE',
		'TOPIC_CONTENT',
		'CREATE_TIME',
		'END_TIME',
		'HAS_PIC',
		'CREATE_USER',
		'LADTITUDE',
		'LONGITUDE',
		'CITY',
		'POSITION_DESC',
	),
)); ?>
