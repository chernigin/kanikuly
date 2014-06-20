<?php
$this->breadcrumbs=array(
	'Личные кабинет',
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
    <h2>Персональная информация</h2>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
        'username',
		'surname',
		'name',
		'mid_name',
		'phone',
		'email',
		'faculty0.name',
		'cource0.n_cource',
	),
)); ?>
</div>
<div id="s" class="well sidebar-nav" style="background:rgb(242,246,211);position:relative; text-align: center; float: right; width: 15%;" >
    <h3 style="text-align: center; padding: 0px;">Меню</h3>
    <div style="position: relative; width: 100%;cursor: pointer; background: rgb(205, 236, 241); margin-bottom: 5px;">
    <?php echo CHtml::link('Редактировать',array('student/update','id'=>$model->id)); ?>
    </div><div  style="position: relative; width: 100%;cursor: pointer; background: rgb(205, 236, 241); margin-bottom: 5px;">
    <?php echo CHtml::link('Сменить пароль',array('student/password','id'=>$model->id)); ?>
    </div><div style="position: relative; width: 100%;cursor: pointer; background: rgb(205, 236, 241); margin-bottom: 5px;">
    <?php echo CHtml::link('Мои заявки',array('requestuser/')); ?></div>
</div>
</div>

<div class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Вкладка 1</a></li>
    <li><a href="#tab2" data-toggle="tab">Вкладка 2</a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
      <div class="well sidebar-nav"  style="background:rgb(242,246,211);float: left; width: 73%;">
    <h2>Персональная информация</h2>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
        'username',
		'surname',
		'name',
		'mid_name',
		'phone',
		'email',
		'faculty0.name',
		'cource0.n_cource',
	),
)); ?>
</div>
    </div>
    <div class="tab-pane" id="tab2">
     <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
  </div>
</div>
