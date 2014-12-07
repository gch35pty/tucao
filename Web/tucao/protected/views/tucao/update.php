<?php
$this->breadcrumbs=array(
	'Tucaos'=>array('index'),
	$model->TITLE=>array('view','id'=>$model->TUCAO_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tucao', 'url'=>array('index')),
	array('label'=>'Create Tucao', 'url'=>array('create')),
	array('label'=>'View Tucao', 'url'=>array('view', 'id'=>$model->TUCAO_ID)),
	array('label'=>'Manage Tucao', 'url'=>array('admin')),
);
?>

<h1>Update Tucao <?php echo $model->TUCAO_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>