<?php
/* @var $this StudentController */
/* @var $model Student */

/*$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Manage',
);*/

$this->menu=array(
	//array('label'=>'List Student', 'url'=>array('index')),
	//array('label'=>'Создать студента', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#student-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал студентов</h1>

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
	'id'=>'student-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
                'username',
		'surname',
		'name',
		'mid_name',
		'phone',
		'faculty0.name',
		/*
		'cource',
		'group',
		'pass',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
