<?php
$this->breadcrumbs=array(
	'Tc Tucao Pics'=>array('index'),
	$model->PIC_ID,
);

$this->menu=array(
	array('label'=>'List tc_tucao_pic', 'url'=>array('index')),
	array('label'=>'Create tc_tucao_pic', 'url'=>array('create')),
	array('label'=>'Update tc_tucao_pic', 'url'=>array('update', 'id'=>$model->PIC_ID)),
	array('label'=>'Delete tc_tucao_pic', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->PIC_ID),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage tc_tucao_pic', 'url'=>array('admin')),
);
?>

<h1>View tc_tucao_pic #<?php echo $model->PIC_ID; ?></h1>

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
