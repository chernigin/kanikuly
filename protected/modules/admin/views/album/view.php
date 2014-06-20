<?php
/* @var $this AlbumController */
/* @var $model Album */

$this->breadcrumbs=array(
	'Albums'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Создать альбом', 'url'=>array('create')),
	array('label'=>'Изменить альбом', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить альбом', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены?')),
	array('label'=>'Журнал альбомов', 'url'=>array('index')),
);
?>

<h1>Просмотреть альбом #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'image',
		'gallery0.name',
	),
)); ?>
