<?php
$this->breadcrumbs=array(
	'Tc Users'=>array('index'),
	$model->USER_ID=>array('view','id'=>$model->USER_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List tc_users', 'url'=>array('index')),
	array('label'=>'Create tc_users', 'url'=>array('create')),
	array('label'=>'View tc_users', 'url'=>array('view', 'id'=>$model->USER_ID)),
	array('label'=>'Manage tc_users', 'url'=>array('admin')),
);
?>

<h1>Update tc_users <?php echo $model->USER_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>