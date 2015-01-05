<?php
$this->breadcrumbs=array(
	'Comment Supports',
);

$this->menu=array(
	array('label'=>'Create comment_support', 'url'=>array('create')),
	array('label'=>'Manage comment_support', 'url'=>array('admin')),
);
?>

<h1>Comment Supports</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
