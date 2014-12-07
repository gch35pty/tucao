<?php
$this->breadcrumbs=array(
	'Tucao Supports',
);

$this->menu=array(
	array('label'=>'Create Tucao_support', 'url'=>array('create')),
	array('label'=>'Manage Tucao_support', 'url'=>array('admin')),
);
?>

<h1>Tucao Supports</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
