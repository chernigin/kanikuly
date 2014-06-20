<?php
/* @var $this FotoController */
/* @var $model Foto */

$this->breadcrumbs=array(
	'Fotos'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Создать фото', 'url'=>array('create')),
	array('label'=>'Просмотреть фото', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Журнал фото', 'url'=>array('index')),
);
?>

<h1>Изменить фото <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
