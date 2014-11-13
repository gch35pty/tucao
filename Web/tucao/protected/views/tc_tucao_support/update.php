<?php
$this->breadcrumbs=array(
	'Tc Tucao Supports'=>array('index'),
	$model->SUPPORT_ID=>array('view','id'=>$model->SUPPORT_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List tc_tucao_support', 'url'=>array('index')),
	array('label'=>'Create tc_tucao_support', 'url'=>array('create')),
	array('label'=>'View tc_tucao_support', 'url'=>array('view', 'id'=>$model->SUPPORT_ID)),
	array('label'=>'Manage tc_tucao_support', 'url'=>array('admin')),
);
?>

<h1>Update tc_tucao_support <?php echo $model->SUPPORT_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>