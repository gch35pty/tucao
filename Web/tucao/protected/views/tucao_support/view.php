<?php
$this->breadcrumbs=array(
	'Tucao Supports'=>array('index'),
	$model->SUPPORT_ID,
);

$this->menu=array(
	array('label'=>'List Tucao_support', 'url'=>array('index')),
	array('label'=>'Create Tucao_support', 'url'=>array('create')),
	array('label'=>'Update Tucao_support', 'url'=>array('update', 'id'=>$model->SUPPORT_ID)),
	array('label'=>'Delete Tucao_support', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->SUPPORT_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tucao_support', 'url'=>array('admin')),
);
?>

<h1>View Tucao_support #<?php echo $model->SUPPORT_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'SUPPORT_ID',
		'TUCAO_ID',
		'SUPPORT_STATUS',
		'USER_ID',
		'CREATE_TIME',
	),
)); ?>
