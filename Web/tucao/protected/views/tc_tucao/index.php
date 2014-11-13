<?php
$this->breadcrumbs=array(
	'Tc Tucaos',
);

$this->menu=array(
	array('label'=>'Create tc_tucao', 'url'=>array('create')),
	array('label'=>'Manage tc_tucao', 'url'=>array('admin')),
);
?>

<h1>Tc Tucaos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
