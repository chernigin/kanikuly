<?php
/* @var $this NewsController */
/* @var $model News */

$this->menu=array(
	
	array('label'=>'Создать новость', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#news-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Журнал новостей</h1>

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
	'id'=>'news-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		'id',
		'name',
		'details',
		'album0.name',
                //'document',
		array(
                   'name'=>'document',
                   'value'=>'$data->document ? CHtml::link(CHtml::image(Yii::app()->request->baseUrl."/media/news/".$data->document,"",array("width"=>"50px")), Yii::app()->controller->createUrl("update",array("id"=>$data->id))) : ""',
                   'type'=>'html',
                ),
		array(
			'class'=>'CButtonColumn',
                        'viewButtonOptions'=> array ('style' => 'display:none'), 
		),
	),
)); ?>
