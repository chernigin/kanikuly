<?php
/* @var $this AlbumController */
/* @var $model Album */

$this->breadcrumbs=array(
	'Albums'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Создать альбом', 'url'=>array('create')),
	array('label'=>'Просмотреть альбом', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Журнал альбомов', 'url'=>array('index')),
);
?>

<h1>Изменить альбом <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
