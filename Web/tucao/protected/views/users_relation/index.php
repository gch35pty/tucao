<?php
$this->breadcrumbs=array(
	'Users Relations',
);

$this->menu=array(
	array('label'=>'Create Users_relation', 'url'=>array('create')),
	array('label'=>'Manage Users_relation', 'url'=>array('admin')),
);
?>

<h1>Users Relations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
