<?php
$this->breadcrumbs=array(
	'Tc Tucao Pics'=>array('index'),
	$model->PIC_ID=>array('view','id'=>$model->PIC_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List tc_tucao_pic', 'url'=>array('index')),
	array('label'=>'Create tc_tucao_pic', 'url'=>array('create')),
	array('label'=>'View tc_tucao_pic', 'url'=>array('view', 'id'=>$model->PIC_ID)),
	array('label'=>'Manage tc_tucao_pic', 'url'=>array('admin')),
);
?>

<h1>Update tc_tucao_pic <?php echo $model->PIC_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>