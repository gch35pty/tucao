<?php
$this->breadcrumbs=array(
	'Tucao Pics'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tucao_pic', 'url'=>array('index')),
	array('label'=>'Manage Tucao_pic', 'url'=>array('admin')),
);
?>

<h1>Create Tucao_pic</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>