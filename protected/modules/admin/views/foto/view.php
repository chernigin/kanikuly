<?php
/* @var $this FotoController */
/* @var $model Foto */

$this->breadcrumbs=array(
	'Fotos'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Создать фото', 'url'=>array('create')),
	array('label'=>'Изменить фото', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить фото', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены?')),
	array('label'=>'Журнал фото', 'url'=>array('index')),
);
?>

<h1>Просмотрть фото #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'album',
		'image',
	),
)); ?>
