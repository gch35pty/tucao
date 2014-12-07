<?php
$this->breadcrumbs=array(
	'Topics'=>array('index'),
	$model->TOPIC_ID=>array('view','id'=>$model->TOPIC_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Topic', 'url'=>array('index')),
	array('label'=>'Create Topic', 'url'=>array('create')),
	array('label'=>'View Topic', 'url'=>array('view', 'id'=>$model->TOPIC_ID)),
	array('label'=>'Manage Topic', 'url'=>array('admin')),
);
?>

<h1>Update Topic <?php echo $model->TOPIC_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>