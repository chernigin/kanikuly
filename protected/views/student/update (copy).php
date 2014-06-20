<?php
$this->breadcrumbs=array(
        'Личный кабинет'=>array('view','id'=>$model->id),
	'Редактировать',
);?>
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
	<h2>Режим редактирования</h2>
	<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
   </div>
	<div id="s" class="well sidebar-nav" style="background:rgb(242,246,211);position:relative; text-align: center; float: right; width: 15%;" >
	    <h3 style ="text-align: center; padding: 0px;">Меню</h3>
	    <div style="position: relative; width: 100%;cursor: pointer; background: rgb(205, 236, 241); margin-bottom: 5px;">
	    	<?php echo CHtml::link('Моя страница',array('student/view','id'=>$model->id)); ?>
	    </div>
	    <div style="position: relative; width: 100%;cursor: pointer; background: rgb(205, 236, 241); margin-bottom: 5px;">
	    	<?php echo CHtml::link('Сменить пароль',array('student/password','id'=>$model->id)); ?>
	    </div>
	</div>
</div>
