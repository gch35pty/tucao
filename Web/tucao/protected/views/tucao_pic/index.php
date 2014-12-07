<?php
$this->breadcrumbs=array(
	'Tucao Pics',
);

$this->menu=array(
	array('label'=>'Create Tucao_pic', 'url'=>array('create')),
	array('label'=>'Manage Tucao_pic', 'url'=>array('admin')),
);
?>

<h1>Tucao Pics</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
