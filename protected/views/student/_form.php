<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl('student/update/'.$model->id),
	'enableAjaxValidation'=>false,
)); ?>

    <div class="alert alert-info">Поля, отмеченные <span class="required">*</span> обязательны для заполнения.</div>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nsb'); ?>
		<?php echo $form->textField($model,'nsb', array(
       'width'=>'100px', 
       )); ?>
		<?php echo $form->error($model,'nsb'); ?>
	</div>
        
        <div class="row">
            <?php echo $form->labelEx($model,'username'); ?>
            <?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255)); ?>
            <?php echo $form->error($model,'username'); ?>
        </div>

	<div class="row">
		<?php echo $form->labelEx($model,'surname'); ?>
		<?php echo $form->textField($model,'surname',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'surname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mid_name'); ?>
		<?php echo $form->textField($model,'mid_name',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'mid_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone'); ?>
		<?php echo $form->textField($model,'phone',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'phone'); ?>
	</div>
	<div class="row">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>

	<div class="row">
		<?php echo $form->labelEx($model,'faculty'); ?>
                <?php echo $form->dropDownList($model,'faculty',CHtml::listData(Faculty::model()->findAll(), 'id', 'name'), array('empty' => 'Выберите факультет')); ?>
		<?php echo $form->error($model,'faculty'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cource'); ?>
		<?php echo $form->dropDownList($model,'cource',CHtml::listData(Cource::model()->findAll(), 'id', 'n_cource'), array('empty' => 'Выберите курс'));?>
		<?php echo $form->error($model,'cource'); ?>

      </div>
    <div class="row">
        <?php echo $form->labelEx($model,'nationality'); ?>
        <?php //echo $form->textField($model,'nationality',array('size'=>30,'maxlength'=>30)); ?>

        <input list="cocktail" size="30" maxlength="30" name="Student[nationality]" id="Student_nationality" type="text" value="" >
        <datalist id="cocktail">
            <option>РФ</option>
        </datalist>

        <?php echo $form->error($model,'nationality'); ?>
    </div>



        <div class="row">
	<button class="btn-info btn" type="submit">Сохранить</button>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
