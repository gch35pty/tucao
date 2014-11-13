<?php
$this->breadcrumbs=array(
	'Tc Tucao Supports'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List tc_tucao_support', 'url'=>array('index')),
	array('label'=>'Manage tc_tucao_support', 'url'=>array('admin')),
);
?>

<h1>Create tc_tucao_support</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>