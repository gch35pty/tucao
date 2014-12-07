<?php
$this->breadcrumbs=array(
	'Tucao Comments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tucao_comment', 'url'=>array('index')),
	array('label'=>'Manage Tucao_comment', 'url'=>array('admin')),
);
?>

<h1>Create Tucao_comment</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>