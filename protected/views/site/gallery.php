<?php
$this->breadcrumbs=array(
	'Галерея',
);?>
<head>
<?php $this->pageTitle=Yii::app()->name . ' | Галерея';?>
<?php Yii::app()->clientScript->registerMetaTag('description','Разделы гелереи Каникулы ЮФУ');?>
<?php Yii::app()->clientScript->registerMetaTag('keywords','ЮФУ, каникулы, фото, галерея, отдых');?>
<?php Yii::app()->clientScript->registerMetaTag('robots','ЮФУ, каникулы, фото, галерея, отдых');?>
<meta name="description" content=' Разделы гелереи Каникулы ЮФУ '>
<meta name="keywords" content=' ЮФУ, каникулы, фото, галерея, отдых, лиманчик, витязь, фотографии, таймази'>
<meta name="robots" content=' ЮФУ, каникулы, фото, галерея, отдых, лиманчик, витязь, фотографии, таймази'>
<script src="/js/jquery.tagcanvas.js" type="text/javascript"></script>
    <style>
        .gallery{
            width: 200px;
            height: 200px;
            float: left;
        }
         a img#d{
            position: relative;
            width: 100%;
            height: 100%;
        }
	#n{font-size:12pt;}

	#myCanvas{left: 50%;
	  margin-left: -200px;
	  position: relative;
	  width: 400px;}
    </style>

	<script type="text/javascript">
	$(document).ready(function() {
		if( ! $('#myCanvas').tagcanvas({
			textColour : 'blue',
     			outlineColour: 'red',
			weight: true,
			outlineThickness : 1,
			zoom: 0.9,
			maxSpeed : 0.04,
			depth : 0.75,
			textHeight: 18
		 }, 'tagcloud'));
	});
	</script>

</head>
<h3 style="text-align:center">Разделы галереи</h3>
 <div>
<?php foreach ($gallery as $g):?>
     <div style="float:left;width:190px;margin-right: 10px;margin-top: 20px;">
	<div><a href="album/<?php echo $g['id']?>"><img  id="d" src="/media/gallery/<?php echo $g['image']?>" class="img-rounded"></a></div>
	<div id="n" style="text-align:center;"> <?php echo CHtml::link($g['name'],array('site/album','id'=>$g['id'])); ?></div>
    </div>
<?php endforeach;?>
<div style="height:0px;clear:both;"></div><br>

	<h3 style="text-align:center; margin-bottom:-20px;">Все альбомы &darr;</h3>
	<canvas width="400" height="400" id="myCanvas">

	<div id="tagcloud">
	<?php foreach($albumName as $a):?>
		<?php echo CHtml::link($a['name'], array('site/photo','id'=>$a['id']));?>
	<?php endforeach;?>
	 </div>

	 </canvas>
</div>
