<?php
$this->breadcrumbs=array(
	'Tucao Supports'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tucao_support', 'url'=>array('index')),
	array('label'=>'Manage Tucao_support', 'url'=>array('admin')),
);
?>

<h1>Create Tucao_support</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>