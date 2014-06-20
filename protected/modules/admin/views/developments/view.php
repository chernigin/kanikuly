<?php
/* @var $this DevelopmentsController */
/* @var $model Developments */

$this->breadcrumbs=array(
	'Developments'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Менеджер событий', 'url'=>array('index')),
	array('label'=>'Создать событие', 'url'=>array('create')),
	array('label'=>'Изменить событие', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить событие', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены?')),
);
?>

<h1>Просмотреть событие #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'details',
		'document',
		'date',
		'album0.name',
	),
)); ?>
