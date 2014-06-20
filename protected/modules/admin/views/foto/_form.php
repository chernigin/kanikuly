<?php
/* @var $this FotoController */
/* @var $model Foto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php // $form=$this->beginWidget('CActiveForm', array(
	//'id'=>'foto-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	//'enableAjaxValidation'=>false,
//)); ?>
<?php $form=$this->beginWidget('CActiveForm',array(
    'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>
	<p class="note">Поля, отмеченные  <span class="required">*</span> обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'album'); ?>
		<?php //echo $form->textField($model,'album'); ?>
		<?php //echo $form->error($model,'album'); ?>
                <?php echo $form->labelEx($model,'album'); ?>
                <?php echo $form->dropDownList($model,'album',CHtml::listData(Album::model()->findAll(), 'id', 'name'), array('empty' => 'Выберите альбом')); ?>
                <?php echo $form->error($model,'album'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'image'); ?>
		<?php //echo $form->textField($model,'image',array('size'=>60,'maxlength'=>100)); ?>
		<?php //echo $form->error($model,'image'); ?>
                <?php if($model->image): ?>
                    <p><?php echo CHtml::encode($model->image); ?></p>
                <?php endif; ?>
                <?php echo $form->labelEx($model,'image'); ?>
                <?php echo $form->fileField($model,'image'); ?>
                <?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
