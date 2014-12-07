<?php
$this->breadcrumbs=array(
	'Tucao Comments',
);

$this->menu=array(
	array('label'=>'Create Tucao_comment', 'url'=>array('create')),
	array('label'=>'Manage Tucao_comment', 'url'=>array('admin')),
);
?>

<h1>Tucao Comments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
