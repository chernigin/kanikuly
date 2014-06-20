<?php
/* @var $this FotoController */
/* @var $model Foto */

$this->breadcrumbs=array(
	'Fotos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Журнал фото', 'url'=>array('index')),
);
?>

<h1>Создать фото</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
