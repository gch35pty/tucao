<?php
$this->breadcrumbs=array(
	'Tc Tucao Comments',
);

$this->menu=array(
	array('label'=>'Create tc_tucao_comment', 'url'=>array('create')),
	array('label'=>'Manage tc_tucao_comment', 'url'=>array('admin')),
);
?>

<h1>Tc Tucao Comments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
