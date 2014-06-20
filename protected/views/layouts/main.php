<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<?php Yii::app()->clientScript->registerCoreScript('jquery');?>  
<?php $ui = Yii::app()->user->id;?>
<?php $user = Student::model()->findByPk($ui);?>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/site.css" />-->
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/kanikuly/css/ie.css" media="screen, projection" />
	<![endif]-->
        <link rel="stylesheet" type="text/css" href="/kanikuly/css/bootstrap-responsive.css"/>
        <link rel="stylesheet" type="text/css" href="/kanikuly/css/bootstrap.css"/>
       
        
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
        <link rel="shortcut icon" href="..\..\..\images\title.png" type="image/x-icon"/>
        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl;?>/js/bootstrap.js"/>
       
         <style>
                  
 #main_style{
     background: 
	 -moz-linear-gradient(
		top,
		 rgba(4,137,199,0.6) ,
          #ffffff 60% );
          
	 
	background: -webkit-gradient(
		linear, left top, left bottom,
		from(rgba(4,137,199,0.6)),
                color-stop(0.60, #ffffff),
		to(#ffffff));
 }
 
</style>

        <script type="text/javascript">
            $(document).ready(function()
                {
			
                    /*$('#d').delay(1000).hide("slow");
					
					$('#posts').on("click", 'a.ww', function() {

						$(this).hide();
						$(this).parent().siblings(".con1").hide();
						$(this).parent().siblings(".con2").show();
						return false;
					});
					
					$('.flag').delay(5000).hide("slow");*/

					
                
                });
        </script>
     
       
</head>

<body>

<div class="container" id="page">

	<div id="header">
        <div id="logo" style="padding-bottom:20px;background: url(<?php echo Yii::app()->request->baseUrl; ?>/images/banner.jpg) repeat-x left top;"><?php //echo CHtml::encode(Yii::app()->name); ?>
			<a href="/"><div style="float:left; position: relative; width: 390px;margin-left: -45px;"><img  src="<?php echo Yii::app()->request->baseUrl; ?>/images/kan.png"/></div></a>
			<div style="float:right;margin-right:-15px;">
			   <a href="http://sfedu.ru" target="_blank">
				   <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/SFULOGO.png" alt="SFU_LOGO" width="147px;" height="147px" style="margin-top: 7px;">
			   </a>
			</div>
			<div style="clear:both;"></div>
			<style> 
                    a.icon img{
                        opacity: 0.7;
                    }
                    a.icon img:hover{
                        opacity: 1;
                    }
                    </style>
			<div style="float: right;margin-top: -30px; bottom:0;padding:0px; right:0;">
				<a class="icon" href="https://www.facebook.com/SFedU" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/f.png"/></a>
				<a class="icon" href="https://www.odnoklassniki.ru/community/48539956478002" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/od.png"/></a>
				<a class="icon" href="http://vk.com/sfedu_official" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/vk.png"/></a>
				<a class="icon" href="https://plus.google.com/u/0/112236634520756404644/posts" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/g+.png"/></a>
				<a class="icon" href="https://twitter.com/sfedu_official" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/t.png"/></a>
				<a class="icon" href="http://www.youtube.com/user/sfeduTV" target="_blank"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/you.png"/></a>
			</div>
		   
        </div>

	</div> <!--header -->
        
        <div class="navbar navbar-inverse nav">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
            <a class="brand" href="/kanikuly"><i class="icon-home icon-white"></i>Главная</a>
            <!--<a class="brand" href="http://test.kanikuly.sfedu.ru/index.php/site/contact">Связь с нами</a>-->
            <a class="brand" href="/kanikuly/createRequest" <?php if(!isset(Yii::app()->user->id)) echo"style='display:none;'";?>><i class="icon-pencil icon-white"></i>Заявка</a>
            <a class="brand" href="/kanikuly/gallery" <?php if(!isset(Yii::app()->user->id)) echo"style='display:none;'";?>><i class="icon-camera icon-white"></i>Галерея</a>
            <a class="brand" href="/kanikuly/admin" <?php if(Yii::app()->user->name!="admin") echo"style='display:none;'";?>><i class="icon-wrench icon-white"></i>Админка</a>
			<ul class="nav">
				<li class="dropdown"><a href="#" class="brand" data-toggle="dropdown"><i class="icon-globe icon-white"></i>Наши лагеря<b class="caret"></b></a>
					<ul class="dropdown-menu">
						<li><?php echo CHtml::link('Лиманчик', array('/site/liman'));?></li>
						<li><?php echo CHtml::link('Таймази', array('/site/taimazi'));?></li>
						<li><?php echo CHtml::link('Витязь', array('/site/vityaz'));?></li>
					</ul>
				</li>
            </ul>
            <a class="brand" href="#" data-toggle="modal" data-target="#myModal" style="padding-left:7px;margin-top:2px;"><i class="icon-info-sign icon-white"></i>О нас</a> 
           
            
	<div class="pull-right" <?php if(isset($ui)) echo "style='display:none;'";?> >
		<a class="brand" href="/kanikuly/login" style="padding-right:5px;">Вход  |</a>
		<a class="brand" href="/kanikuly/registration" >Регистрация</a>
	</div>	
            <div class="pull-right" <?php if(!isset($ui)) echo "style='display:none;'";?> >
                <ul class="nav pull-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-user icon-white"></i><?php if(isset($user)) echo ' '.$user->name.' '.$user->surname;?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><?php echo CHtml::link('<i class="icon-info-sign"></i> Моя страница', array('/student/view', 'id'=>Yii::app()->user->id));?></li>
                            <li><?php echo CHtml::link('<i class="icon-wrench"></i> Редактировать', array('/student/update', 'id'=>Yii::app()->user->id));?></li>
                            <li><?php echo CHtml::link('<i class="icon-off"></i> Выйти', array('/site/logout'));?></li>
                        </ul>
                    </li>
                </ul>
         </div> 
        </div>
    </div>
</div> 
        
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
                <br>
 
<!-------- Modal О нас -->
<div style="display:none;" class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">

	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h3 style="text-align:center;" id="myModalLabel">О нас</h3>
  </div>
  <div class="modal-body">
    <p style="font-size:14pt;"><img style="width: 130px; height: 130px" src="/kanikuly/images/grumpy.png"><b>А что ты тут хотел увидеть?</b></p>
  </div>
  <div class="modal-footer">
	<button class="btn btn-info" data-dismiss="modal" aria-hidden="true">Закрыть</button>
  </div>
</div>
<!-------- Modal О нас -->
	<?php echo $content; ?>
    <div class="clear"></div>
           
     
	<div id="footer">
		<!--Copyright &copy; <?php //echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>-->
		<?php// echo Yii::powered(); ?>
             ©Южный федеральный университет | 344006, г.Ростов-на-Дону, ул.Большая Садовая, 105/42
	</div><!-- footer -->


</div><!-- page --> 

</body>
</html>
