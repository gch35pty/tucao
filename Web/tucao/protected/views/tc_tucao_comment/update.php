<?php
$this->breadcrumbs=array(
	'Tc Tucao Comments'=>array('index'),
	$model->COMMENT_ID=>array('view','id'=>$model->COMMENT_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List tc_tucao_comment', 'url'=>array('index')),
	array('label'=>'Create tc_tucao_comment', 'url'=>array('create')),
	array('label'=>'View tc_tucao_comment', 'url'=>array('view', 'id'=>$model->COMMENT_ID)),
	array('label'=>'Manage tc_tucao_comment', 'url'=>array('admin')),
);
?>

<h1>Update tc_tucao_comment <?php echo $model->COMMENT_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>