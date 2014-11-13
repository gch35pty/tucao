<?php
$this->breadcrumbs=array(
	'Tc Tucao Pics',
);

$this->menu=array(
	array('label'=>'Create tc_tucao_pic', 'url'=>array('create')),
	array('label'=>'Manage tc_tucao_pic', 'url'=>array('admin')),
);
?>

<h1>Tc Tucao Pics</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
