<?php
$this->breadcrumbs=array(
	'Tc Shares'=>array('index'),
	$model->SHARE_ID=>array('view','id'=>$model->SHARE_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List tc_share', 'url'=>array('index')),
	array('label'=>'Create tc_share', 'url'=>array('create')),
	array('label'=>'View tc_share', 'url'=>array('view', 'id'=>$model->SHARE_ID)),
	array('label'=>'Manage tc_share', 'url'=>array('admin')),
);
?>

<h1>Update tc_share <?php echo $model->SHARE_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>