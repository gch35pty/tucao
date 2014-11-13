<?php
$this->breadcrumbs=array(
	'Tc Users',
);

$this->menu=array(
	array('label'=>'Create tc_users', 'url'=>array('create')),
	array('label'=>'Manage tc_users', 'url'=>array('admin')),
);
?>

<h1>Tc Users</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
