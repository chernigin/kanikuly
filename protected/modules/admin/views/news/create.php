<?php
/* @var $this NewsController */
/* @var $model News */



$this->menu=array(
	array('label'=>'Журнал новостей', 'url'=>array('index')),
	
);
?>

<h1>Создать новость</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>