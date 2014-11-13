<?php
$this->breadcrumbs=array(
	'Tc Shares'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List tc_share', 'url'=>array('index')),
	array('label'=>'Manage tc_share', 'url'=>array('admin')),
);
?>

<h1>Create tc_share</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>