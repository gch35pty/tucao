<?php
$this->breadcrumbs=array(
	'Tucaos',
);

$this->menu=array(
	array('label'=>'Create Tucao', 'url'=>array('create')),
	array('label'=>'Manage Tucao', 'url'=>array('admin')),
);
?>

<h1>Tucaos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
