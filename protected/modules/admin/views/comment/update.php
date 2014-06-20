<?php
/* @var $this CommentController */
/* @var $model Comment */

$this->breadcrumbs=array(
	'Comments'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Создать коммент', 'url'=>array('create')),
	array('label'=>'Просмотреть коммент', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Журнал комментов', 'url'=>array('index')),
);
?>

<h1>Изменить коммент <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
