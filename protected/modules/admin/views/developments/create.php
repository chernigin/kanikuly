<?php
/* @var $this DevelopmentsController */
/* @var $model Developments */

$this->breadcrumbs=array(
	'Developments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Журнал событий', 'url'=>array('index')),
);
?>

<h1>Создать событие</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
