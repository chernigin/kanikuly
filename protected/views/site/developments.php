<?php

$this->breadcrumbs=array(
	'События',
);
?>
<head>

<?php $this->pageTitle = 'Каникулы ЮФУ | События'; ?>
<?php Yii::app()->clientScript->registerMetaTag('description','События Каникулы-ЮФУ');?>
<?php Yii::app()->clientScript->registerMetaTag('keywords','ЮФУ, каникулы, события, отдых');?>
<?php Yii::app()->clientScript->registerMetaTag('robots','ЮФУ, каникулы, события, отдых');?>
	<script type="text/javascript" src="//yandex.st/share/share.js"charset="utf-8"></script>
	<link rel="stylesheet" type="text/css" href="/jquery.fancybox/jquery.fancybox.css" media="screen" />
	<!--<script type="text/javascript" src="/jquery.fancybox/jquery.easing.1.3.js"></script>-->
    	<script type="text/javascript" src="/jquery.fancybox/jquery.fancybox-1.2.1.pack.js"></script>
    	<script type="text/javascript">
		$(document).ready(function(){
    			$(document).on('mouseenter', 'p a', function(e){
        		e.preventDefault();
       			$(this).fancybox();
    			});
		});
	</script>
</head>
<div style="float: left; width:20%">
	<?php $this->widget('ext.simple-calendar.SimpleCalendarWidget'); ?>
	<ul><li type='square' style="color:red; font-size:150%"><span style="color:black; font-size:70%;">События</span></li></ul>
	<div style="border-bottom:1px solid blue;"></div>
	<div style="text-align:center;"class="yashare-auto-init" data-yashareL10n="ru" data-yashareType="icon" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir"></div> 
</div>

<div id="data" style="width:78%; float: right">
<?php if(isset ($news)){
    foreach ($news as $n):?>
		<div class="hero-unit" style="padding:10px;">
			<?php echo Yii::app()->dateFormatter->format('d MMMM yyyy', $n['date']).'г';?><br>
			<p style="color:blue; margin-bottom:2px;border-bottom:1px solid black; border-top:1px solid black;"><b><?php echo $n['name'];?></b></p>
			<p style="float:left;padding: 0px; width:150px; height: 150px; margin-right:10px; margin-bottom: -5px;">
					<a id="d" rel="group" href="/media/developments/<?php echo $n['document']; ?>"><img style="position:relative; width:100%; height:100%;" src="/media/developments/<?php echo $n['document']; ?>" class="img-rounded" /></a>
			</p>
			<p style="font-size:11pt;"><?php echo $n['details'];?></p>
			<a style="<?php if(empty($n['album'])) echo 'display:none;';?>" href="http://test.kanikuly.sfedu.ru/index.php/site/photo/<?php echo $n['album'];?>">Фотоотчет</a>
			
		</div>
	<?php endforeach;
}?>
<?php 
    if(isset($news_detail)){
		foreach ($news_detail as $p):?>
			<div class="hero-unit" style="padding:10px;">
				<?php echo Yii::app()->dateFormatter->format('d MMMM yyyy', $p['date']).'г';?><br>
				<p style="color:blue; margin-bottom:2px;border-bottom:1px solid black; border-top:1px solid black;"><b><?php echo $p['name'];?></b></p>
				<p style="float:left;padding: 0px; width:150px; height: 150px; margin-right:10px; margin-bottom: -5px;">
					<a id="d" rel="group" href="/media/developments/<?php echo $p['document']; ?>"><img style="position:relative; width:100%; height:100%;" src="/media/developments/<?php echo $p['document']; ?>" class="img-rounded" /></a>
				</p>
				<p style="font-size:11pt;"><?php echo $p['details'];?></p>
				<a style="<?php if(empty($p['album'])) echo 'display:none;';?>" href="http://test.kanikuly.sfedu.ru/index.php/site/photo/<?php echo $p['album'];?>">Фотоотчет</a>
			</div>
		<?php endforeach;
    }
?>
</div>
