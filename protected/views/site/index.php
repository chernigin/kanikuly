<html>
<head>
<?php //$this->pageTitle = 'Каникулы ЮФУ'; ?>
<?php $this->pageTitle=Yii::app()->name .' | Главная'; ?>
<?php Yii::app()->clientScript->registerMetaTag('description','Новости Каликулы ЮФУ');?>
<?php Yii::app()->clientScript->registerMetaTag('keywords','ЮФУ, каникулы, фото, галерея, фотографии, отдых, новости, события, Южный Федеральный университет, студент');?>
<meta name="description" content=' Новости Каникулы ЮФУ'>
<meta name="keywords" content=' ЮФУ, каникулы, фото, галерея, фотографии, отдых, новости, события, Южный Федеральный университет, студент, море, горы'>
<meta name="robots" content=' ЮФУ, каникулы, фото, галерея, фотографии, отдых, новости, события, Южный Федеральный университет, студент, море, горы, '>	
<style>
        .con2, .w{
            display: none;
        }
        span a{
			font-size:11pt;	
		}
		.hero-unit:hover{border:1px solid green; -moz-box-shadow:0 0 20px green; -webkit-box-shadow:0 0 20px green;box-shadow:0 0 20px green;}
</style>
       
       <script>
    $(document).ready(function() {

        $('#posts').on("click", 'a.ww', function() {

            $(this).hide();
			$(this).siblings(".w").show();
            $(this).parent().siblings(".con1").hide();
            $(this).parent().siblings(".con2").show();
            return false;
        });
	$('.flag').delay(5000).hide("slow");	
	$('#posts').on("click", 'a.w', function() {

            $(this).hide();
			$(this).siblings(".ww").show();
            $(this).parent().siblings(".con1").show();
            $(this).parent().siblings(".con2").hide();
            return false;
        });
$(window).scroll(function(){
if ($(this).scrollTop() > 100) {
$('.scrollup').fadeIn();
} else {
$('.scrollup').fadeOut();
}
});
 
$('.scrollup').click(function(){
$("html, body").animate({ scrollTop: 0 }, 600);
return false;
});
		
    });

</script>
<script>
            /*$(document).ready(function()
                {
                    $('.flag').delay(5000).hide("slow");
                });*/
</script>
    </head>
    <body>
        <?php
        $this->breadcrumbs=array(
);
        ?>
       
       <div class="flag">
       <?php if(Yii::app()->user->hasFlash('regisrtation')):?>
       <?php echo Yii::app()->user->getFlash('regisrtation');?>
       <?php endif;?>
       </div>
       <div class="flag">
       <?php if(Yii::app()->user->hasFlash('requestMessage')):?>
       <?php echo Yii::app()->user->getFlash('requestMessage')?>
       <?php endif;?>
       </div>
	   <div class="flag">
       <?php if(Yii::app()->user->hasFlash('commentError')):?>
       <?php echo Yii::app()->user->getFlash('commentError');?>
       <?php endif;?>
       </div>
	   <div class="flag">
       <?php if(Yii::app()->user->hasFlash('contact')):?>
       <?php echo Yii::app()->user->getFlash('contact');?>
       <?php endif;?>
       </div>
	
     <h2 style="color:white; text-align: center; padding-top:0px; margin-top:0px;">Новости <img src="/kanikuly/images/gazeta.png"/></h2>
	   
<div id="posts">
    
<?php foreach($posts as $post): ?>
    <div class="post">
        <div class="hero-unit" style="background:#FCECDC; position: relative; padding:10px; border:1px solid green">
            <div style="float:left;padding: 0px; width:110px; height: 110px; margin-right:5px; margin-bottom: -4px;">
				<?php if(Yii::app()->user->id) echo '<a href="http://kanikuly.sfedu.ru/index.php/news/'.$post->id.'">';?>
					<img style="position:relative; width: 100%; height: 100%"src="/media/news/<?php echo $post['document'];?>">
				<?php if(Yii::app()->user->id) echo '</a>'?>
            </div>
             
            <div style="font-size:12pt;">
                <i class="icon icon-calendar"></i><?php echo Yii::app()->dateFormatter->format('d MMMM yyyy', $post->date).', '?><i class="icon icon-time"></i><?php echo Yii::app()->dateFormatter->format('HH:mm(мск)', $post->date)?>
	    </div>
            
			<div style="line-height:1.2;font-size:11pt;color:green; margin-bottom:2px;border-bottom:1px solid blue; border-top:1px solid blue;">
				<b><?php echo $post['name']?></b>
            </div>
            <div class="con1" style="line-height:1.3;font-size:11pt;">
                <?php //echo substr($post->details,0,230)?><?php //echo ' ...'?>
				<?php echo mb_substr($post->details,0,200,'UTF-8').' ...'?>
            </div>
            <div class="con2" style="line-height:1.3;font-size:11pt;">
                <?php echo $post['details']?>
            </div>
            <div style="clear:both;height:0px;"></div>
              
		<div style="text-align:right;">   
				<a href="#" class="ww" style="font-size:11pt;">Развернуть</a>&nbsp
				<a href="#" class="w" style="font-size:11pt;">Свернуть</a>
				<span <?php if(!Yii::app()->user->id)echo "style='display:none;'";?>><?php echo CHtml::link('Подробнее', array('news/view', 'id'=>$post->id));?></span>
            </div>
        </div>
    </div>
<?php endforeach; ?>
</div>
<?php $this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
    'contentSelector' => '#posts',
    'itemSelector' => 'div.post',
    'loadingText' => 'Loading...',
    'donetext' => 'Новостей больше нет',
    'pages' => $pages,
)); ?>

<a href="#" style="width:40px;
height:40px;
opacity:0.3;
position:fixed;
bottom:50px;
display:none;
right:100px;
text-indent:-9999px;
background: url('../kanikuly/images/icon_top.png') no-repeat;" class="scrollup">Наверх</a>
</body>
</html>
