<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->USER_ID=>array('view','id'=>$model->USER_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Users', 'url'=>array('index')),
	array('label'=>'Create Users', 'url'=>array('create')),
	array('label'=>'View Users', 'url'=>array('view', 'id'=>$model->USER_ID)),
	array('label'=>'Manage Users', 'url'=>array('admin')),
);
?>

<h1>Update Users <?php echo $model->USER_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>