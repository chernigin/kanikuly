<?php
/* @var $this RequestController */
/* @var $model Request */

$this->breadcrumbs=array(
	'Requests'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Журнал запросов', 'url'=>array('index')),
	
);
?>

<h1>Создать запрос</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>