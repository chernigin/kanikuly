<?php
/* @var $this PeriodController */
/* @var $model Period */

/*$this->breadcrumbs=array(
	'Periods'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);*/

$this->menu=array(
	array('label'=>'Журнал периодов', 'url'=>array('index')),
	array('label'=>'Создать период', 'url'=>array('create')),
	//array('label'=>'View Period', 'url'=>array('view', 'id'=>$model->id)),
	//array('label'=>'Manage Period', 'url'=>array('admin')),
);
?>

<h1>Изменение периода <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>