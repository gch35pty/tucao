<?php
$this->breadcrumbs=array(
	'Tc Tucao Comments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List tc_tucao_comment', 'url'=>array('index')),
	array('label'=>'Manage tc_tucao_comment', 'url'=>array('admin')),
);
?>

<h1>Create tc_tucao_comment</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>