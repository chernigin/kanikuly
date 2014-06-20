<?php
/* @var $this StudentController */
/* @var $model Student */

/*$this->breadcrumbs=array(
	'Students'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);*/

$this->menu=array(
	array('label'=>'Журнал студентов', 'url'=>array('index')),
	//array('label'=>'Создать студента', 'url'=>array('create')),
	array('label'=>'Просмотр студента', 'url'=>array('view', 'id'=>$model->id)),
        array('label'=>'Изменить пароль', 'url'=>array('password', 'id'=>$model->id)),
	
);
?>

<h1>Изменить студента <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>