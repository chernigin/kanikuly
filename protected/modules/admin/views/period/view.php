<?php
/* @var $this PeriodController */
/* @var $model Period */

/*$this->breadcrumbs=array(
	'Periods'=>array('index'),
	$model->id,
);*/

$this->menu=array(
	array('label'=>'Журнал периодов', 'url'=>array('index')),
	array('label'=>'Создать период', 'url'=>array('create')),
	array('label'=>'Изменить период', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Удалить период', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Period', 'url'=>array('admin')),
);
?>

<h1>Просмотр периода #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'period1',
		'period2',
		'putevka',
	),
)); ?>
