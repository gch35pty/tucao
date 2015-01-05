<?php
$this->breadcrumbs=array(
	'Comment Supports'=>array('index'),
	$model->SUPPORT_ID=>array('view','id'=>$model->SUPPORT_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List comment_support', 'url'=>array('index')),
	array('label'=>'Create comment_support', 'url'=>array('create')),
	array('label'=>'View comment_support', 'url'=>array('view', 'id'=>$model->SUPPORT_ID)),
	array('label'=>'Manage comment_support', 'url'=>array('admin')),
);
?>

<h1>Update comment_support <?php echo $model->SUPPORT_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>