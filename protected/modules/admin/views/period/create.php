<?php
/* @var $this PeriodController */
/* @var $model Period */

/*$this->breadcrumbs=array(
	'Periods'=>array('index'),
	'Create',
);*/

$this->menu=array(
	//array('label'=>'List Period', 'url'=>array('index')),
	array('label'=>'Журнал периодов', 'url'=>array('index')),
);
?>

<h1>Создать период</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>