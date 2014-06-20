<?php
$this->breadcrumbs=array(
        'Галерея'=>array('gallery'),
		'Альбомы'=>array('album','id'=>$album->gallery),
		'Фото',
);?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<?php $this->pageTitle=Yii::app()->name .' | Фотографии'; ?>
<?php Yii::app()->clientScript->registerMetaTag('description','Фотографии Каникулы ЮФУ');?>
<?php Yii::app()->clientScript->registerMetaTag('keywords','ЮФУ, каникулы, фотографии, фото, отдых');?>
<?php Yii::app()->clientScript->registerMetaTag('robots','ЮФУ, каникулы, фотографии, фото, отдых');?>
	<meta name="description" content=' Фотографии Каникулы ЮФУ'>
	<meta name="keywords" content=' ЮФУ, каникулы, фотографии, фото, отдых'>
	<meta name="robots" content=' ЮФУ, каникулы, фотографии, фото, отдых'>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta http-equiv="imagetoolbar" content="no" />
	<link rel="stylesheet" type="text/css" href="/jquery.fancybox/jquery.fancybox.css" media="screen" />
	<script type="text/javascript" src="/jquery.fancybox/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="/jquery.fancybox/jquery.fancybox-1.2.1.pack.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$("p a").fancybox();
		});
	</script>
	<script type="text/javascript" src="//yandex.st/share/share.js"charset="utf-8"></script>
	<style>
		html, body {
			color: #333;
		}
		
		a {
			outline: none;	
		}
		
		div#wrap {
			position: relative;
            width: 100%;
            margin: 50px auto;
		}
               
		img#g{
            width:100px;
            height: 100px;
			border: 1px solid #CCC;
			padding: 2px;	
			margin: 10px 5px 10px 0;
		}
        p {
			position: relative;
            width: 100%;
        }
	</style>
</head>
<body>
    <h2 style="text-align:center;">Фото из альбома "<?php echo $album->name;?>"</h2>
    <div id="wrap">          
        <?php if (empty($photo)) {?>
            <div class="alert alert-info" style="text-align:center;">В этом альбоме еще нет фотографий</div>
        <?php };?>
        <p style="position:relative; width: 100%; padding-left:15px;">
              <?php foreach ($photo as $f):?>
              <a id="d" rel="group" title="<?php echo $f['name'];?>" href="/media/gallery/photo/<?php echo $f['image'];?>"><img style="margin-right:5px;" id="g" src="/media/gallery/photo/<?php echo $f['image'];?>" class="img-rounded" /></a>
              <?php endforeach;?>
        </p>	
    </div>
	<div style="float: left; margin-top:10px; margin-bottom:10px; font-size:12pt;">
		<button class="btn-info btn" type="submit" onclick="location.href='http://kanikuly.sfedu.ru/album/<?php echo $album->gallery;?>'"><i class="icon-step-backward icon-white"></i>К альбомам</button>
	</div>
	<div style="clear:both;"></div>
	<br>
	<div class="yashare-auto-init" data-yashareL10n="ru"
 data-yashareType="button" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir,lj,gplus"
></div> 
</body>
</html>
