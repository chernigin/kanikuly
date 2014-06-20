<?php
/* @var $this GalleryController */
/* @var $model Gallery */

$this->breadcrumbs=array(
	'Galleries'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'Создать раздел', 'url'=>array('create')),
	array('label'=>'Изденить раздел', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить раздел', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены?')),
	array('label'=>'Журнал разделов', 'url'=>array('index')),
);
?>

<h1>Просмотр раздела #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'image',
	),
)); ?>
