<div class="form-signin" style="padding-right:12px;">
<?php $this->pageTitle = 'Каникулы ЮФУ'; ?>
<?php Yii::app()->clientScript->registerMetaTag('description','Авторизация Каникулы ЮФУ');?>
<?php Yii::app()->clientScript->registerMetaTag('keywords','ЮФУ, каникулы, отдых, авторизация');?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
        'action' => Yii::app()->createUrl('site/login'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<div class="input-block-level">
		<?php echo $form->labelEx($model,'Логин :'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="input-block-level">
		<?php echo $form->labelEx($model,'Пароль :'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="checkbox">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'Запомнить'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>
	<div class="input-block-level" style="display:none;">
        <input name="LoginForm[passworddop]" id="LoginForm_passworddop" type="password">
    </div>
        <button class="btn-info btn" type="submit">Войти</button>
        <a href ="http://kanikuly.sfedu.ru/registration">Регистрация</a>

<?php $this->endWidget(); ?>
</div><!-- form-signin -->
 
