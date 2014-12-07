<?php
$this->breadcrumbs=array(
	'Shares'=>array('index'),
	$model->SHARE_ID=>array('view','id'=>$model->SHARE_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Share', 'url'=>array('index')),
	array('label'=>'Create Share', 'url'=>array('create')),
	array('label'=>'View Share', 'url'=>array('view', 'id'=>$model->SHARE_ID)),
	array('label'=>'Manage Share', 'url'=>array('admin')),
);
?>

<h1>Update Share <?php echo $model->SHARE_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>