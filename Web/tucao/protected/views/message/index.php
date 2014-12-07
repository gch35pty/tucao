<?php
$this->breadcrumbs=array(
	'Messages',
);

$this->menu=array(
	array('label'=>'Create message', 'url'=>array('create')),
	array('label'=>'Manage message', 'url'=>array('admin')),
);
?>

<h1>Messages</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
