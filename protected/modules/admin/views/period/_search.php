<?php
/* @var $this PeriodController */
/* @var $model Period */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'period1'); ?>
		<?php echo $form->dropDownList($model,'period1',CHtml::listData(Period::model()->findAll(), 'id', 'period1'), array('empty' => '')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'period2'); ?>
		<?php echo $form->dropDownList($model,'period2',CHtml::listData(Period::model()->findAll(), 'id', 'period2'), array('empty' => '')); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'putevka'); ?>
		<?php echo $form->dropDownList($model,'putevka',CHtml::listData(Putevka::model()->findAll(), 'id', 'name'), array('empty' => 'Выберите путевку')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Поиск'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->