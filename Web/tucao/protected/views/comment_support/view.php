<?php
$this->breadcrumbs=array(
	'Comment Supports'=>array('index'),
	$model->SUPPORT_ID,
);

$this->menu=array(
	array('label'=>'List comment_support', 'url'=>array('index')),
	array('label'=>'Create comment_support', 'url'=>array('create')),
	array('label'=>'Update comment_support', 'url'=>array('update', 'id'=>$model->SUPPORT_ID)),
	array('label'=>'Delete comment_support', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->SUPPORT_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage comment_support', 'url'=>array('admin')),
);
?>

<h1>View comment_support #<?php echo $model->SUPPORT_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'SUPPORT_ID',
		'COMMENT_ID',
		'SUPPORT_STATUS',
		'USER_ID',
		'CREATE_TIME',
		'STATUS',
	),
)); ?>
