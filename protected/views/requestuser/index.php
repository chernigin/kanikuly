<!--
<head>
    <script>
          /*  $(document).ready(function()
                {
                    $('.flag').delay(5000).hide("slow");
                });*/
    </script>
</head>

 <div class="flag">
       <?php //if(Yii::app()->user->hasFlash('updateMessage')):?>
       <?php //echo Yii::app()->user->getFlash('updateMessage')?>
       <?php //endif;?>
</div>-->
<?php

$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
        'id'=>'update',
        'options'=>array(
            'title'=>'Изменить путевку',
            'autoOpen'=>false,
            'modal'=>true,
            'width'=>'auto',
            'height'=>'auto',
            'resizable'=>'false',
        ),
    ));
$this->endWidget();
 
$updateDialog = <<<'EOT'
function() {
    var url = $(this).attr('href');
    $.get(url, function(r){
        $("#update").html(r).dialog("open");
    });
    return false;
}
EOT;

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
    $('.search-form').toggle();
    return false;
});
$('.search-form form').submit(function(){
    $.fn.yiiGridView.update('requestuser-grid', {
        data: $(this).serialize()
    });
    return false;
});
");
?>

<h3>Список оформленных путевок</h3>
<?php $this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'requestuser-grid',
    'ajaxUpdate'=>false,
    'dataProvider'=>$m->search(),
    'columns'=>array(
        //'id',
		'putevka0.name',
		'period0.PeriodString',
		'place',
		'note',
		'date',
        'status0.name',
        array(
            'class'=>'CButtonColumn',
			'template'=>"{update}, {delete}",
            'buttons' => array(
                'update' => array(
					
                    'click'=>$updateDialog,
					'url'=>'$this->grid->controller->createUrl("/requestuser/update", array("id"=>$data->id))',
                ),
				'delete' => array(
					'url'=>'$this->grid->controller->createUrl("/requestuser/delete", array("id"=>$data->id))',
                ),
            ), 
        ),
    ),
)); ?>

<?php echo $m->ID;?>