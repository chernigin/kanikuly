<?php
/* @var $this CommentController */
/* @var $model Comment */
/* @var $form CActiveForm */
?>
<style>
    #textarea_tag{
    border-right: 1px solid #e3e3e3;
border-bottom: 1px solid #e3e3e3;
border-left: 1px solid #e3e3e3;
padding: 2px .7225433526011561%;
width: 98.55491329479769%;
background-color: #f1f1f1;
margin-bottom: 5px;
margin-top: -2px;
margin-left: 2px;
padding-right: 2px;
    }
    .mute{
        color: #888;
    }
   div.controls textarea{
        padding: 0px;
    }
  div.controls textarea:focus{
        border-width: 2px;
        border-color: rgba(44,175,235,1);
    }  
</style>


<div>
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
        'action'=>Yii::app()->createUrl('comment/create'),
	'enableAjaxValidation'=>true,
)); ?>

<?php //echo $form->errorSummary($model); ?>


<!--<div class="controls">
		<?php //echo $form->labelEx($model,'content'); ?>
           
		<?php //echo $form->textField($model,'content'); 
//echo $form->textArea($model,'content',array('rows'=>5,'cols'=>77,'placeholder'=>'Введите комментарий','maxlength'=>500,)); ?>
		
</div>-->
  <?php echo $form->error($model,'content'); ?>
		<?php $this->widget('application.extensions.eckeditor.ECKEditor', array(
                'model'=>$model,
                'attribute'=>'content',
         )); ?>
   
         <?php 
          if (Yii::app()->user->name=="admin") {echo '<div class="row" style="display:block;">';}
         else {echo '<div class="row" style="display:none;">'; } ?>
		<?php echo $form->labelEx($model,'status'); ?>
                <?php echo $form->dropDownList($model,'status',CHtml::listData(Status_Type::model()->findAll(), 'id','type')); ?>
		<?php echo $form->error($model,'status'); ?>
	

	

	
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php  echo $form->textField($model,'user_id', array('value'=>Yii::app()->user->id)); ?>
        <?php //echo $form->dropDownList($model,'user_id',CHtml::listData(Student::model()->findAll(), 'id','username')); ?>
		<?php echo $form->error($model,'user_id'); ?>
	
		<?php echo $form->labelEx($model,'news_id'); ?>
		<?php echo $form->textField($model, 'news_id', array( 'value'=>$news,)); ?>
		<?php echo $form->error($model,'news_id'); ?>
	</div>
 
	
            

<!--	<div class="row buttons">
		<?php// echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>-->
       <button class="btn btn-large btn-primary" type="submit">Отправить</button>

<?php $this->endWidget();?>

</div>
</div><!-- form -->
