<?php
$this->breadcrumbs=array(
	'Tc Tucao Supports',
);

$this->menu=array(
	array('label'=>'Create tc_tucao_support', 'url'=>array('create')),
	array('label'=>'Manage tc_tucao_support', 'url'=>array('admin')),
);
?>

<h1>Tc Tucao Supports</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
