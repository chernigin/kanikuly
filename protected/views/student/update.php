<?php $this->pageTitle=Yii::app()->name .' | Личный кабинет'; ?>
<?php
$this->breadcrumbs=array(
	'Личные кабинет',
);?>

<div class="row-fluid">
    <h2>Личный кабинет</h2>


</div>


<div class="tabbable tabs-left"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs"><h3 style="text-align: center; padding: 0px;">Меню</h3>
    <li><a href="#tab1" data-toggle="tab">Моя страница</a></li>
    <li><a href="#tab2" data-toggle="tab">Сменить пароль</a></li>
	<li><a href="#tab3" data-toggle="tab">Мои путевки</a></li>
	<li class="active"><a href="#tab4" data-toggle="tab">Редактировать профиль</a></li>
<!--<li style="text-align:center;"><button class="btn-info btn" type="submit" onclick="location.href='http://test.kanikuly.sfedu.ru/index.php/requestuser'">Мои путевки</button></li>-->
  </ul>
  <div class="tab-content">
    <div class="tab-pane" id="tab1">
      <div class="well sidebar-nav"  style="background:rgb(242,246,211);float: left; width: 90%;">
			    <h3>Персональная информация</h3>
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
      <?php echo $this->renderPartial('password', array('model'=>$model)); ?>
    </div>
	
	<div class="tab-pane" id="tab3">
	<?php 
		$m = new Requestuser('search');
		echo $this->renderPartial('/requestuser/index', array('m'=>$m));
	?>
	</div>
	
	<div class="tab-pane active" id="tab4">
		<div class="well sidebar-nav"  style="background:rgb(242,246,211);float: left; width: 90%;">
			<h3>Редактировать профиль</h3>
			<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
		</div>
    </div>
	
  </div>
</div>
</div>


