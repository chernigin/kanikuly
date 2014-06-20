<?php
/* @var $this GalleryController */
/* @var $model Gallery */

$this->breadcrumbs=array(
	'Galleries'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Журнал разделов', 'url'=>array('index')),
);
?>

<h1>Создать раздел галереи</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
