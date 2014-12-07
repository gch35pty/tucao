<?php
$this->breadcrumbs=array(
	'Messages'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List message', 'url'=>array('index')),
	array('label'=>'Manage message', 'url'=>array('admin')),
);
?>

<h1>Create message</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>