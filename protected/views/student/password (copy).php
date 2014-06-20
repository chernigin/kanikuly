<?php
$this->breadcrumbs=array(
    'Личный кабинет'=>array('view','id'=>$model->id),
	'Сменить пароль',
);?>
<?php //$iu=Yii::app()->user->id;?>
<head>
	<style>
		#s a{
			color:black;
			text-decoration:none;
		}
		#s a:hover{
		text-decoration:none;
		}
	
	</style>
</head>
<div class="row-fluid">
    <h2>Личный кабинет</h2>
<div class="well sidebar-nav"  style="background:rgb(242,246,211);float: left; width: 73%;">
<h2>Смена пароля</h2>

Укажите <b>новый</b> пароль <br/>
<?php
 echo CHtml::form();
 echo CHtml::textField ('Password');?>
<button class="btn-info btn" type="submit">Сохранить</button>
<?php echo CHtml::endForm();        
?>
</div>

<div id="s" class="well sidebar-nav" style="background:rgb(242,246,211);position:relative; text-align: center; float: right; width: 15%;" >
    <h3 style="text-align: center; padding: 0px;">Меню</h3>
    <div style="position: relative; width: 100%;cursor: pointer; background: rgb(205, 236, 241); margin-bottom: 
         5px;">
    <?php echo CHtml::link('Редактировать',array('student/update','id'=>$model->id)); ?>
    </div><div style="position: relative; width: 100%;cursor: pointer; background: rgb(205, 236, 241); margin-bottom: 
         5px;">
    <?php echo CHtml::link('Сменить пароль',array('student/password','id'=>$model->id)); ?>
    </div><div style="position: relative; width: 100%;cursor: pointer; background: rgb(205, 236, 241); margin-bottom: 
         5px;">
    <?php echo CHtml::link('Мои заявки',array('requestuser/')); ?></div>
	
	</div>
</div>
