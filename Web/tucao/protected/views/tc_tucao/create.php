<?php
$this->breadcrumbs=array(
	'Tc Tucaos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List tc_tucao', 'url'=>array('index')),
	array('label'=>'Manage tc_tucao', 'url'=>array('admin')),
);
?>

<h1>Create tc_tucao</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>