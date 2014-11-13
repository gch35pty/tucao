<?php
$this->breadcrumbs=array(
	'Tc Users Relations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List tc_users_relation', 'url'=>array('index')),
	array('label'=>'Manage tc_users_relation', 'url'=>array('admin')),
);
?>

<h1>Create tc_users_relation</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>