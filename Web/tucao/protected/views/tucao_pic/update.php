<?php
$this->breadcrumbs=array(
	'Tucao Pics'=>array('index'),
	$model->PIC_ID=>array('view','id'=>$model->PIC_ID),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tucao_pic', 'url'=>array('index')),
	array('label'=>'Create Tucao_pic', 'url'=>array('create')),
	array('label'=>'View Tucao_pic', 'url'=>array('view', 'id'=>$model->PIC_ID)),
	array('label'=>'Manage Tucao_pic', 'url'=>array('admin')),
);
?>

<h1>Update Tucao_pic <?php echo $model->PIC_ID; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>