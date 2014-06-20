<?php
/* @var $this AlbumController */
/* @var $model Album */

$this->breadcrumbs=array(
	'Albums'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Журнал альбомов', 'url'=>array('index')),
);
?>

<h1>Создать альбом</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
