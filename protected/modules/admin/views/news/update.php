<?php
/* @var $this NewsController */
/* @var $model News */

/*$this->breadcrumbs=array(
	'News'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);*/

$this->menu=array(
	array('label'=>'Журнал новостей', 'url'=>array('index')),
	array('label'=>'Создать новость', 'url'=>array('create')),
	//array('label'=>'Просмотр', 'url'=>array('view', 'id'=>$model->id)),
	
);
?>

<h1>Изменение новости <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>