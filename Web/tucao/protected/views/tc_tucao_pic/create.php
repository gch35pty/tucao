<?php
$this->breadcrumbs=array(
	'Tc Tucao Pics'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List tc_tucao_pic', 'url'=>array('index')),
	array('label'=>'Manage tc_tucao_pic', 'url'=>array('admin')),
);
?>

<h1>Create tc_tucao_pic</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>