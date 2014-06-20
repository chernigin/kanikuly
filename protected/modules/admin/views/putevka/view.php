<?php
/* @var $this PutevkaController */
/* @var $model Putevka */

$this->breadcrumbs=array(
	'Putevkas'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Putevka', 'url'=>array('index')),
	array('label'=>'Create Putevka', 'url'=>array('create')),
	array('label'=>'Update Putevka', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Putevka', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены?')),
	array('label'=>'Manage Putevka', 'url'=>array('admin')),
);
?>

<h1>View Putevka #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'year',
	),
)); ?>
