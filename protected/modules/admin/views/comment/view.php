<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs=array(
	'Comments'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Создать коммент', 'url'=>array('create')),
	array('label'=>'Изменить коммент', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить коммент', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены?')),
	array('label'=>'Журнал комментов', 'url'=>array('index')),
);
?>

<h1>Просмотреть коммент #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'content',
		'status0.type',
		'create_time',
		'student.surname',
		'news.name',
	),
)); ?>
