<?php
$this->breadcrumbs=array(
	'Tc Topics',
);

$this->menu=array(
	array('label'=>'Create tc_topic', 'url'=>array('create')),
	array('label'=>'Manage tc_topic', 'url'=>array('admin')),
);
?>

<h1>Tc Topics</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
