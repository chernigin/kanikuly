<?php
/* @var $this DevelopmentsController */
/* @var $model Developments */
/* @var $form CActiveForm */
?>

<div class="form">

<?php //$form=$this->beginWidget('CActiveForm', array(
	//'id'=>'developments-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
//	'enableAjaxValidation'=>false,
//)); ?>
    
    <?php $form=$this->beginWidget('CActiveForm',array(
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'details'); ?>
		<?php echo $form->textField($model,'details',array('size'=>60,'maxlength'=>1500)); ?>
		<?php echo $form->error($model,'details'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'document'); ?>
		<?php //echo $form->textField($model,'document',array('size'=>60,'maxlength'=>250)); ?>
		<?php //echo $form->error($model,'document'); ?>
                <?php if($model->document): ?>
                    <p><?php echo CHtml::encode($model->document); ?></p>
                <?php endif; ?>
                <?php echo $form->labelEx($model,'document'); ?>
                <?php echo $form->fileField($model,'document'); ?>
                <?php echo $form->error($model,'document'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
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
