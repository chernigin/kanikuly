<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo">Панель администратора</div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Главная', 'url'=>array('/admin')),
                                array('label'=>'Новости', 'url'=>array('/admin/news')),
                                array('label'=>'Путевки', 'url'=>array('/admin/putevka')),
                                array('label'=>'Период', 'url'=>array('/admin/period')),
                                array('label'=>'Студенты', 'url'=>array('/admin/student')),
                                array('label'=>'Запросы', 'url'=>array('/admin/request')),
                                array('label'=>'События', 'url'=>array('/admin/developments')),
				array('label'=>'Разделы', 'url'=>array('/admin/gallery')),
                                array('label'=>'Альбомы', 'url'=>array('/admin/album')),
                                array('label'=>'Фото', 'url'=>array('/admin/foto')),
                                array('label'=>'Комменты', 'url'=>array('/admin/comment')),
                                array('label'=>'Выйти ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest),
                                array('label'=>'К_сайту', 'url'=>array('/site/index')),
			),
		)); ?>
            
      	</div><!-- mainmenu -->
	
	<?php echo $content; ?>
            
	<div class="clear"></div>

	<div id="footer">
                ©Южный федеральный университет | 344006, г.Ростов-на-Дону, ул.Большая Садовая, 105/42
	</div><!-- footer -->

</div><!-- container page -->

</body>
</html>
