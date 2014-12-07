<?php
$this->breadcrumbs=array(
	'Tucao Supports'=>array('index'),
	$model->SUPPORT_ID=>array('view','id'=>$model->SUPPORT_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tucao_support', 'url'=>array('index')),
	array('label'=>'Create Tucao_support', 'url'=>array('create')),
	array('label'=>'View Tucao_support', 'url'=>array('view', 'id'=>$model->SUPPORT_ID)),
	array('label'=>'Manage Tucao_support', 'url'=>array('admin')),
);
?>

<h1>Update Tucao_support <?php echo $model->SUPPORT_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>