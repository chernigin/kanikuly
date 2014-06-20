<?php
/* @var $this GalleryController */
/* @var $model Gallery */

$this->breadcrumbs=array(
	'Galleries'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Создать раздел', 'url'=>array('create')),
	array('label'=>'Просмотр раздела', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Журнал разделов', 'url'=>array('index')),
);
?>

<h1>Изменить раздел <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
