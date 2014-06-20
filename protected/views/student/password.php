
<div class="row-fluid">
<div class="well sidebar-nav"  style="background:rgb(242,246,211);float: left; width: 90%;">
<h3>Смена пароля</h3>

Укажите <b>новый</b> пароль <br/>
<?php $form=$this->beginWidget('CActiveForm', array(
	//'id'=>'student-form',
	'action'=>Yii::app()->createUrl('student/password/'.$model->id),
	'enableAjaxValidation'=>false,
)); 
 echo CHtml::textField ('Password');?>
<button class="btn-info btn" type="submit">Сохранить</button>
<?php $this->endWidget(); ?>       

</div>

</div>
