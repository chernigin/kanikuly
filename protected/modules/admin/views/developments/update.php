<?php
/* @var $this DevelopmentsController */
/* @var $model Developments */

$this->breadcrumbs=array(
	'Developments'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Создать событие', 'url'=>array('create')),
	array('label'=>'Просмотреть событие', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Журнал событий', 'url'=>array('index')),
);
?>

<h1>Изменить событие <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
