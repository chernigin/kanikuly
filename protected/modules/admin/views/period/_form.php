<?php
/* @var $this PeriodController */
/* @var $model Period */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'period-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля, отмеченные  <span class="required">*</span> обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'period1'); ?>
		<?php echo $form->textField($model,'period1'); ?>
		<?php echo $form->error($model,'period1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'period2'); ?>
		<?php echo $form->textField($model,'period2'); ?>
		<?php echo $form->error($model,'period2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'putevka'); ?>
		<?php //echo $form->textField($model,'putevka'); ?>
                <?php echo $form->dropDownList($model,'putevka',CHtml::listData(Putevka::model()->findAll(), 'id', 'name'), array('empty' => 'Название путевки')); ?>
		<?php echo $form->error($model,'putevka'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->