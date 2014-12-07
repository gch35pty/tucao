<?php
$this->breadcrumbs=array(
	'Topics'=>array('index'),
	$model->TOPIC_ID,
);

$this->menu=array(
	array('label'=>'List Topic', 'url'=>array('index')),
	array('label'=>'Create Topic', 'url'=>array('create')),
	array('label'=>'Update Topic', 'url'=>array('update', 'id'=>$model->TOPIC_ID)),
	array('label'=>'Delete Topic', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->TOPIC_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Topic', 'url'=>array('admin')),
);
?>

<h1>View Topic #<?php echo $model->TOPIC_ID; ?></h1>

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
