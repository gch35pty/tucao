<?php
$this->breadcrumbs=array(
	'Tucao Pics'=>array('index'),
	$model->PIC_ID,
);

$this->menu=array(
	array('label'=>'List Tucao_pic', 'url'=>array('index')),
	array('label'=>'Create Tucao_pic', 'url'=>array('create')),
	array('label'=>'Update Tucao_pic', 'url'=>array('update', 'id'=>$model->PIC_ID)),
	array('label'=>'Delete Tucao_pic', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->PIC_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tucao_pic', 'url'=>array('admin')),
);
?>

<h1>View Tucao_pic #<?php echo $model->PIC_ID; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'PIC_ID',
		'PIC_SRC',
		'SMALL_PIC_SRC',
		'TUCAO_ID',
		'USER_ID',
		'CREATE_TIME',
		'LENGTH',
		'WIDTH',
	),
)); ?>
