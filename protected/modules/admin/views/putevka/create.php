<?php
/* @var $this PutevkaController */
/* @var $model Putevka */

$this->breadcrumbs=array(
	'Putevkas'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Putevka', 'url'=>array('index')),
	array('label'=>'Журнал путевок', 'url'=>array('index')),
);
?>

<h1>Создать путевку</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>