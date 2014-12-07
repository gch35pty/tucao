<?php
$this->breadcrumbs=array(
	'Shares',
);

$this->menu=array(
	array('label'=>'Create Share', 'url'=>array('create')),
	array('label'=>'Manage Share', 'url'=>array('admin')),
);
?>

<h1>Shares</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
