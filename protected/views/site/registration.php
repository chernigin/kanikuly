<head>
<?php $this->pageTitle=Yii::app()->name .' | Регистрация'; ?>
<?php Yii::app()->clientScript->registerMetaTag('description','Регистрация Каникулы ЮФУ');?>
<?php Yii::app()->clientScript->registerMetaTag('keywords','ЮФУ, каникулы, отдых, регистрация');?>
<?php Yii::app()->clientScript->registerMetaTag('robots','ЮФУ, каникулы, лиманчик, отдых');?>
	<script src="/js/jquery.maskedinput.js" type="text/javascript"></script>
    <script>
        function Show_HidePassword(id, button) {
            var element = document.getElementById(id);
            if (element.type == 'password') {
                button.textContent = 'Скрывать пароль';
                var inp = document.createElement("input");
                inp.id = id;
                inp.type = "text";
                inp.name = "Student[pass]";
                inp.value = element.value;
                inp.placeholder = "Пароль";
                element.parentNode.replaceChild(inp, element);
            }
            else {
                button.textContent = 'Показывать пароль';
                var inp = document.createElement("input");
                inp.id = id;
                inp.type = "password";
                inp.name = "Student[pass]";
                inp.value = element.value;
                inp.placeholder = "Пароль";
                element.parentNode.replaceChild(inp, element);
            }
            inp.focus();
            inp.selectionEnd = inp.value.length;
        }
    </script>
    <script type="text/javascript">
		$(document).ready(function() {
				$(':input','#p').val('');
		});
/*
		jQuery(function($){
		   $("#phone").mask("+7(999)999-9999");
		});*/
	</script>
    <style>
        #Student_pass{
            width: 80%;
            margin-right: 15px;
        }
    </style>
</head>
<body>
<?php if(Yii::app()->user->hasFlash('regis')):?>
<div class="flag"><?php echo Yii::app()->user->getFlash('regis')?></div>
<?php endif;?>
<?php if(Yii::app()->user->hasFlash('reg')):?>
<div class="flag"><?php echo Yii::app()->user->getFlash('reg')?></div>
<?php endif;?>
<?php if(Yii::app()->user->hasFlash('registration')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('registration'); ?>
</div>

<?php else: ?>
<div class="alert alert-error">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <h4 style="margin-bottom:5px;margin-top:5px;">Внимание!</h4>
  <p style="font-size:12pt;">В случае некорректно введенных данных, Ваш профиль будет удален.</p>
</div> 

<div class="form">
<h2 class="form-signin-heading">Регистрация</h2>
  <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
));?>

<div class="alert alert-info">Поля, отмеченные <span class="required">*</span> обязательны для заполнения.</div>

    <?php echo $form->errorSummary($model); ?>

    <div class="form-control input-lg">
        <?php echo $form->labelEx($model,'nsb'); ?>
        <?php echo $form->textField($model,'nsb'); ?>
        <?php echo $form->error($model,'nsb'); ?>
    </div>
    <div class="input-block-level">
        <?php echo $form->labelEx($model,'surname'); ?>
        <?php echo $form->textField($model,'surname',array('size'=>20,'maxlength'=>30)); ?>
        <?php echo $form->error($model,'surname'); ?>
    </div>

    <div class="input-block-level">
        <?php echo $form->labelEx($model,'name'); ?>
        <?php echo $form->textField($model,'name',array('size'=>20,'maxlength'=>20)); ?>
        <?php echo $form->error($model,'name'); ?>
    </div>

    <div class="input-block-level">
        <?php echo $form->labelEx($model,'mid_name'); ?>
        <?php echo $form->textField($model,'mid_name',array('size'=>20,'maxlength'=>20)); ?>
        <?php echo $form->error($model,'mid_name'); ?>
    </div>
    <div class="input-block-level">
           <?php echo $form->labelEx($model,'username'); ?>
           <?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20)); ?>
           <?php echo $form->error($model,'username'); ?>
    </div>
    <div class="input-block-level">
        <?php echo $form->labelEx($model,'phone'); ?>
        <?php //echo $form->textField($model,'phone',array('id'=>'phone','size'=>20,'maxlength'=>20)); ?>
		<?php
			$this->widget('CMaskedTextField', array(
					'model' => $model,
					'attribute' => 'phone',
					'mask' => '+7-999-999-9999  9999',
					//'placeholder' => '*',
					'htmlOptions' => array('size' => 15, 'maxlength'=>15)
			));
		?>
		<?php echo $form->error($model,'phone'); ?>
	</div>

	<div class="input-block-level">
        <?php echo $form->labelEx($model,'email'); ?>
        <?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>100)); ?>
        <?php echo $form->error($model,'email'); ?>
    </div>  

    <div class="input-block-level">
        <?php echo $form->labelEx($model,'faculty'); ?>
        <?php echo $form->dropDownList($model,'faculty',CHtml::listData(Faculty::model()->findAll(), 'id', 'name'), array('empty' => 'Выберите факультет')); ?>
        <?php echo $form->error($model,'faculty'); ?>
    </div>

    <div class="input-block-level">
        <?php echo $form->labelEx($model,'cource'); ?>
        <?php echo $form->dropDownList($model,'cource',CHtml::listData(Cource::model()->findAll(), 'id', 'n_cource'), array('empty' => 'Выберите курс')); ?>
        <?php echo $form->error($model,'cource'); ?>
    </div>

    <div class="input-block-leve">
        <?php echo $form->labelEx($model,'nationality'); ?>
        <?php //echo $form->textField($model,'nationality',array('size'=>30,'maxlength'=>30)); ?>

        <input list="cocktail" size="30" maxlength="30" name="Student[nationality]" id="Student_nationality" type="text" value="" >
        <datalist id="cocktail">
            <option>РФ</option>
        </datalist>

        <?php echo $form->error($model,'nationality'); ?>
    </div>

    <div class="input-block-level" id="p">
        <?php echo $form->labelEx($model,'pass'); ?>
        <?php echo $form->passwordField($model,'pass',array('placeholder'=>"Пароль",'size'=>20,'maxlength'=>255)); ?><span><a href="#" onclick="Show_HidePassword('Student_pass', this); return false;">Показывать пароль</a></span>
        <?php echo $form->error($model,'pass'); ?>


        <?php if(CCaptcha::checkRequirements()): ?>
	<div class="input-block-level">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
            <div style="padding-top:5px; padding-bottom: 5px;">
		<?php $this->widget('CCaptcha'); ?>
                
		<div class="alert alert-info">Пожалуйста, введите буквы так, как они показаны на рисунке. Буквы вводятся без учета регистра.</div>
		
                 <div style= padding-bottom: 5px;">
		<?php echo $form->textField($model,'verifyCode'); ?></div>
		</div><?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

    <button class="btn btn-large btn-primary" type="submit">Регистрация</button>


<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>

</body>
