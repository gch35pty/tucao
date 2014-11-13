<?php
$this->breadcrumbs=array(
	'Tc Tucaos'=>array('index'),
	$model->TITLE=>array('view','id'=>$model->TC_TUCAO),
	'Update',
);

$this->menu=array(
	array('label'=>'List tc_tucao', 'url'=>array('index')),
	array('label'=>'Create tc_tucao', 'url'=>array('create')),
	array('label'=>'View tc_tucao', 'url'=>array('view', 'id'=>$model->TC_TUCAO)),
	array('label'=>'Manage tc_tucao', 'url'=>array('admin')),
);
?>

<h1>Update tc_tucao <?php echo $model->TC_TUCAO; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>