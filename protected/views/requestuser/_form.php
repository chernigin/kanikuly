<div class="form">
 
<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'requestuser-form',
    'enableAjaxValidation'=>false,
)); ?>
 
    <?php echo $form->errorSummary($m); ?>

	<div class="row">
		<?php echo $form->labelEx($m,'note'); ?>
		<?php echo $form->textArea($m,'note',array('rows'=>5, 'cols'=>10,'maxlength'=>2000,'placeholder'=>"Ваши достижения")); ?>
	</div>	
        
        <div class="row">
		<?php echo $form->labelEx($m,'place'); ?>
		<?php echo $form->textArea($m,'place',array('rows'=>5, 'cols'=>75,'maxlength'=>2000,'placeholder'=>"Пожелания по расселению")); ?>
	</div>
 
    <?php if (!Yii::app()->request->isAjaxRequest): ?>
    <div class="row buttons ">
        <?php echo CHtml::submitButton($m->isNewRecord ? 'Создать' : 'Сохранить'); ?>
    </div>
     
    <?php else: ?>
    <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
        <div class="ui-dialog-buttonset">
        <?php
            $this->widget('zii.widgets.jui.CJuiButton', array(
                'name'=>'submit_'.rand(),
                'caption'=>$m->isNewRecord ? 'Создать' : 'Сохранить',
                'htmlOptions'=>array(
                    'ajax' => array(
                        'url'=>$m->isNewRecord ? $this->createUrl('create') : $this->createUrl('update', array('id'=>$m->id)),
                        'type'=>'post',
                        'data'=>'js:jQuery(this).parents("form").serialize()',
                        'success'=>'function(r){
                            if(r=="success"){
                                window.location.reload();
                            }
                            else{
                                $("#create").html(r).dialog("open"); return false;
                            }
                        }', 
                    ),
                ),
            ));
        ?>
        </div>
    </div>
    <?php endif; ?>
 
<?php $this->endWidget(); ?>
 
</div><!-- form -->