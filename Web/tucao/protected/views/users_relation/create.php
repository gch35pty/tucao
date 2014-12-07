<?php
$this->breadcrumbs=array(
	'Users Relations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Users_relation', 'url'=>array('index')),
	array('label'=>'Manage Users_relation', 'url'=>array('admin')),
);
?>

<h1>Create Users_relation</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>