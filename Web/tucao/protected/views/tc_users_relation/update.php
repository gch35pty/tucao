<?php
$this->breadcrumbs=array(
	'Tc Users Relations'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List tc_users_relation', 'url'=>array('index')),
	array('label'=>'Create tc_users_relation', 'url'=>array('create')),
	array('label'=>'View tc_users_relation', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage tc_users_relation', 'url'=>array('admin')),
);
?>

<h1>Update tc_users_relation <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>