<?php
$this->breadcrumbs=array(
	'Галерея'=>array('gallery'),
	'Альбомы',
);?>
<head>
<?php $this->pageTitle = 'Каникулы ЮФУ | Альбомы'; ?>
<?php Yii::app()->clientScript->registerMetaTag('description','Альбомы галереи Каникулы ЮФУ');?>
<?php Yii::app()->clientScript->registerMetaTag('keywords','ЮФУ, каникулы, фото, галерея, фотографии, отдых, фотоальбомы, #kanikuly');?>
<?php Yii::app()->clientScript->registerMetaTag('robots','ЮФУ, каникулы, фото, галерея, фотографии, отдых, фотоальбомы');?>
    <style>
        .gallery{
            width: 200px;
            height: 200px;
            float: left;
        }
         #img{
            position: relative;
            width: 150px;
            height: 150px;
        }
    </style>
	<script type="text/javascript" src="//yandex.st/share/share.js"charset="utf-8"></script>
</head>
<h3 style="text-align:center">Фотоальбомы из раздела "<?php echo $gallery->name;?>"</h3>
<?php if (empty($album)) {?>
	<div class="alert alert-info" style="text-align:center;">Еще нет альбомов</div>
<?php };?>
<div id="gallery" style="padding-left:15px">
<?php foreach ($album as $a):?>
     <div style="float:left; width:150px;margin-right: 10px;margin-top: 20px;"> <div><a href="http://kanikuly.sfedu.ru/photo/<?php echo $a['id']?>"><img id="img" src="/media/gallery/album/<?php echo $a['image']?>" class="img-rounded"></a></div>
     <div style="text-align:center;"> <?php echo CHtml::link($a['name'],array('site/photo','id'=>$a['id'])); ?></div></div>
<?php endforeach;?>
<div style="height:0px;clear:both;"></div>

<div style="float: left; margin-top:10px; margin-bottom:10px; font-size:12pt;">
	<button class="btn-info btn" type="submit" onclick="location.href='http://kanikuly.sfedu.ru/gallery'"><i class="icon-step-backward icon-white"></i>Разделы галереи</button>
</div>
<br>
<div style="clear:both;"></div>
<div class="yashare-auto-init" data-yashareL10n="ru"
 data-yashareType="button" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir,lj,gplus"
></div> 
</div>
