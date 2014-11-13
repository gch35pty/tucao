<?php
$this->breadcrumbs=array(
	'Tc Topics'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List tc_topic', 'url'=>array('index')),
	array('label'=>'Manage tc_topic', 'url'=>array('admin')),
);
?>

<h1>Create tc_topic</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>