<style>	#contact-form input, #contact-form textarea {width:230px;}</style>
<div class="flag">
<?php if(Yii::app()->user->hasFlash('contact')): ?>
<?php echo Yii::app()->user->getFlash('contact'); ?>
<?php else: ?>
</div>

<div class="form">

<?php
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'action' => Yii::app()->createUrl('site/contact'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); 

?>

<div style="float:left">
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subject'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>
</div>
<div style="float:left;">
	<div class="row" style="margin-bottom:18px;">
		<?php echo $form->labelEx($model,'body'); ?>
		</span><?php echo $form->textArea($model,'body', array('rows'=>4)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>



	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php //echo $form->labelEx($model,'verifyCode'); ?>
		<?php $this->widget('CCaptcha'); ?><br>
		<?php echo $form->textField($model,'verifyCode',array('placeholder'=>"Код с картинки")); ?>
		
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>
</div>
<div class="clear"></div>
	<div class="row buttons" style="align:center;">
		<button class="btn btn-large btn-primary" type="submit">Отправить</button>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>
