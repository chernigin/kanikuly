<?php
/* @var $this PutevkaController */
/* @var $model Putevka */

$this->breadcrumbs=array(
	'Putevkas'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'Журнал путевок', 'url'=>array('index')),
        //array('label'=>'List Putevka', 'url'=>array('index')),
	array('label'=>'Создать путевку', 'url'=>array('create')),
	//array('label'=>'View Putevka', 'url'=>array('view', 'id'=>$model->id)),
	
);
?>

<h1>Изменить путевку <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>