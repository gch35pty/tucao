<?php
$this->breadcrumbs=array(
	'Tc Users Relations',
);

$this->menu=array(
	array('label'=>'Create tc_users_relation', 'url'=>array('create')),
	array('label'=>'Manage tc_users_relation', 'url'=>array('admin')),
);
?>

<h1>Tc Users Relations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
