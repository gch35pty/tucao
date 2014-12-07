<?php
$this->breadcrumbs=array(
	'Messages'=>array('index'),
	$model->MESSAGE_ID=>array('view','id'=>$model->MESSAGE_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List message', 'url'=>array('index')),
	array('label'=>'Create message', 'url'=>array('create')),
	array('label'=>'View message', 'url'=>array('view', 'id'=>$model->MESSAGE_ID)),
	array('label'=>'Manage message', 'url'=>array('admin')),
);
?>

<h1>Update message <?php echo $model->MESSAGE_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>