<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs=array(
	'Comments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Журнал комментов', 'url'=>array('index')),
);
?>

<h1>Создать коммент</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
