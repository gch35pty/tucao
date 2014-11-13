<?php
$this->breadcrumbs=array(
	'Tc Topics'=>array('index'),
	$model->TOPIC_ID=>array('view','id'=>$model->TOPIC_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List tc_topic', 'url'=>array('index')),
	array('label'=>'Create tc_topic', 'url'=>array('create')),
	array('label'=>'View tc_topic', 'url'=>array('view', 'id'=>$model->TOPIC_ID)),
	array('label'=>'Manage tc_topic', 'url'=>array('admin')),
);
?>

<h1>Update tc_topic <?php echo $model->TOPIC_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>