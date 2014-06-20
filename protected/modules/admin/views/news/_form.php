<?php
/* @var $this NewsController */
/* @var $model News */
/* @var $form CActiveForm */
?>

<div class="form">
<?php 
	$form=$this->beginWidget('CActiveForm',array(
    	'htmlOptions'=>array('enctype'=>'multipart/form-data'),
	)); 
?>
    

	<p class="note">Поля, отмеченные  <span class="required">*</span> обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>40,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'details'); ?>
		<?php //echo $form->textField($model,'details',array('size'=>60,'maxlength'=>2500)); ?>
		<?php //echo $form->error($model,'details'); ?>
		 <?php echo $form->error($model,'details'); ?>
		<?php $this->widget('application.extensions.eckeditor.ECKEditor', array(
                'model'=>$model,
                'attribute'=>'details',
         )); ?>	
	</div>
	 
       
    <div class="row">
        <?php if($model->document): ?>
           <p><?php echo CHtml::encode($model->document); ?></p>
        <?php endif; ?>
        <?php echo $form->labelEx($model,'document'); ?>
        <?php echo $form->fileField($model,'document'); ?>
        <?php echo $form->error($model,'document'); ?>
    </div>
    
    <div class="row">
                <?php echo $form->labelEx($model,'album'); ?>
                <?php echo $form->dropDownList($model,'album',CHtml::listData(Album::model()->findAllByAttributes(array('gallery'=>5)), 'id', 'name'), array('empty' => 'Выберите альбом')); ?>
                <?php echo $form->error($model,'album'); ?>
	</div>
 

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
