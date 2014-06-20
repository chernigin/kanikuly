<?php
/* @var $this GalleryController */
/* @var $model Gallery */

$this->breadcrumbs=array(
	'Galleries'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Создать раздел', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#gallery-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Разделы гелереи</h1>

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
	'id'=>'gallery-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		//'image',
		array(
                   'name'=>'image',
                   'value'=>'$data->image ? CHtml::link(CHtml::image(Yii::app()->request->baseUrl."/media/gallery/".$data->image,"",array("width"=>"50px")), Yii::app()->controller->createUrl("update",array("id"=>$data->id))) : ""',
                   'type'=>'html',
                ),
		array(
			'class'=>'CButtonColumn',
                        'viewButtonOptions'=> array ('style' => 'display:none'),
		),
	),
)); ?>
