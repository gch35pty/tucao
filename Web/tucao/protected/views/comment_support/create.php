<?php
$this->breadcrumbs=array(
	'Comment Supports'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List comment_support', 'url'=>array('index')),
	array('label'=>'Manage comment_support', 'url'=>array('admin')),
);
?>

<h1>Create comment_support</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>