<?php
/* @var $this PutevkaController */
/* @var $model Putevka */
/*
$this->breadcrumbs=array(
	'Putevkas'=>array('index'),
	'Manage',
);*/

$this->menu=array(
	//array('label'=>'List Putevka', 'url'=>array('index')),
	array('label'=>'Создать путевку', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#putevka-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал путевок</h1>
<p>
В начале каждого поиска, можно вводить операторы спавнения (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
или <b>=</b>), чтобы указать, какое сравнение должно быть сделано.
</p>
<?php echo CHtml::link('Расширенный поиск','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'putevka-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'year',
		array(
			'class'=>'CButtonColumn',
                        'viewButtonOptions'=> array ('style' => 'display:none'),
		),
	),
)); ?>
