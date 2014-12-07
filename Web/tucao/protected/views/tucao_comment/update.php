<?php
$this->breadcrumbs=array(
	'Tucao Comments'=>array('index'),
	$model->COMMENT_ID=>array('view','id'=>$model->COMMENT_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tucao_comment', 'url'=>array('index')),
	array('label'=>'Create Tucao_comment', 'url'=>array('create')),
	array('label'=>'View Tucao_comment', 'url'=>array('view', 'id'=>$model->COMMENT_ID)),
	array('label'=>'Manage Tucao_comment', 'url'=>array('admin')),
);
?>

<h1>Update Tucao_comment <?php echo $model->COMMENT_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>