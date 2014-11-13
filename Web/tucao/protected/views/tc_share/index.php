<?php
$this->breadcrumbs=array(
	'Tc Shares',
);

$this->menu=array(
	array('label'=>'Create tc_share', 'url'=>array('create')),
	array('label'=>'Manage tc_share', 'url'=>array('admin')),
);
?>

<h1>Tc Shares</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
