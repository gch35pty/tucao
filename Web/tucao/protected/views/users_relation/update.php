<?php
$this->breadcrumbs=array(
	'Users Relations'=>array('index'),
	$model->ID=>array('view','id'=>$model->ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Users_relation', 'url'=>array('index')),
	array('label'=>'Create Users_relation', 'url'=>array('create')),
	array('label'=>'View Users_relation', 'url'=>array('view', 'id'=>$model->ID)),
	array('label'=>'Manage Users_relation', 'url'=>array('admin')),
);
?>

<h1>Update Users_relation <?php echo $model->ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>