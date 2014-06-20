<?php
/* @var $this StudentController */
/* @var $model Student */

/*$this->breadcrumbs=array(
	'Students'=>array('index'),
	$model->name,
);*/

$this->menu=array(
	array('label'=>'Журнал студентов', 'url'=>array('index')),
	//array('label'=>'Создать студента', 'url'=>array('create')),
	array('label'=>'Изменить студента', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить студента', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Вы уверены?')),
	//array('label'=>'Manage Student', 'url'=>array('admin')),
);
?>

<h1>Просмотр студента #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'surname',
		'name',
		'mid_name',
		'phone',
		'faculty0.name',
		/*'cource',
		'group',*/
		'pass',
	),
)); ?>
