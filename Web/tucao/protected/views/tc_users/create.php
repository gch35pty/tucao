<?php
$this->breadcrumbs=array(
	'Tc Users'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List tc_users', 'url'=>array('index')),
	array('label'=>'Manage tc_users', 'url'=>array('admin')),
);
?>

<h1>Create tc_users</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>