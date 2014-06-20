<?php
/* @var $this RequestController */
/* @var $model Request */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'request-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Поля, отмеченные <span class="required">*</span> обязательны для заполнения.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'student'); ?>
		<?php echo $form->dropDownList($model,'student',CHtml::listData(Student::model()->findAll(), 'id','surname'), array('empty' => 'Выберите путевку')); ?>
		<?php echo $form->error($model,'student'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'putevka'); ?>
		<?php echo $form->dropDownList($model,'putevka',CHtml::listData(Putevka::model()->findAll(), 'id', 'name'), array('empty' => 'Выберите путевку')); ?>
		<?php echo $form->error($model,'putevka'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'period'); ?>
		<?php echo $form->dropDownList($model,'period',CHtml::listData(Period::model()->findAll(),'id','PeriodString'), array('empty' => 'Выберите период')); ?>
		<?php echo $form->error($model,'period'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'note'); ?>
		<?php echo $form->textField($model,'note',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'note'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'place'); ?>
		<?php echo $form->textField($model,'place',array('size'=>60,'maxlength'=>1000)); ?>
		<?php echo $form->error($model,'place'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model,'status'); ?>
        <?php echo $form->dropDownList($model,'status',CHtml::listData(RequestStatus::model()->findAll(),'id','name'), array('empty' => 'Выберите период')); ?>
        <?php echo $form->error($model,'status'); ?>
    </div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->