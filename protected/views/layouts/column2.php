<?php $this->beginContent('//layouts/main'); ?>
<?php $dev = Yii::app()->db->createCommand("SELECT * FROM developments order by id desc limit 3")->queryAll();?>
<?php $iu=Yii::app()->user->id;?>
<html>
<head>
<script>

$(document).ready(function() {
	$('#myCarousel').carousel(); 
	
	$('#popover').popover({placement:"right",trigger:"hover"});
	$('.hider').toggle(function(){
					
			$(this).siblings('.well').show("slow"); 
					$(this).children('.t').show();
					$(this).children('.f').hide(); 
	},function(){
		  $(this).siblings('.well').hide("slow");
			  $(this).children('.t').hide();
			  $(this).children('.f').show();
	 });
	
	$(".trigger").click(function(){
		$(".panel").toggle("fast");
		$(this).toggleClass("active");
		return false;
	});
});
</script>
 
	<style>
 
		.but{
			border-radius: 5px; 
			//background: #f5f5f5;
			font-size: 16px;
			//border:solid 2px #bf0f32; 
			border:solid 2px green; 
			
		}
		.f, .t{
			font-size: 22px;
			text-align: center
		}
		.t{
		font-family: Arial, Helvetica, sans-serif;
		font-size: 22px;
		color: #fafafa;
		padding: 10px 22px;
		background: -moz-linear-gradient(
			top,
			#49afcd 0%,
			#f5f5f5);
		background: -webkit-gradient(
			linear, left top, left bottom,
			from(#49afcd),
			to(#f5f5f5));
		}
		#sv{
			-moz-box-shadow:0 0 10px green; -webkit-box-shadow:0 0 10px green;box-shadow:0 0 10px green;
		}
	
.panel {
//position: absolute;
//top: 50px;
position:fixed;
top:35%; right:0px;
z-index:100;
//right: 0;
display: none;
background: #000000;
border:1px solid #111111;
-moz-border-radius-topleft: 20px;
-webkit-border-top-left-radius: 20px;
-moz-border-radius-bottomleft: 20px;
-webkit-border-bottom-left-radius: 20px;
width: 600px;
height: auto;
//padding: 30px 130px 30px 30px;
filter: alpha(opacity=85);
opacity: .85;
}



.panel a, .panel a:visited{
margin: 0;
padding: 0;
color: #9FC54E;
text-decoration: none;
border-bottom: 1px solid #9FC54E;
}

.panel a:hover, .panel a:visited:hover{
margin: 0;
padding: 0;
color: #ffffff;
text-decoration: none;
border-bottom: 1px solid #ffffff;
}

a.trigger{
//position: absolute;
position:fixed;
top:40%; right:0px;
text-decoration: none;
//top: 80px; right: 0;
font-size: 16px;
letter-spacing:-1px;
font-family: verdana, helvetica, arial, sans-serif;
color:#fff;
padding: 20px 15px 20px 40px;
font-weight: 700;
background:#333333 url(images/plus.png) 15% 50% no-repeat;
border:1px solid #444444;
-moz-border-radius-topleft: 20px;
-webkit-border-radius: 20px;
-moz-border-radius-bottomleft: 20px;
-webkit-border-bottom-left-radius: 20px;
-moz-border-radius-bottomright: 0px;
display: block;
-moz-transform: rotate(90deg);
    -webkit-transform: rotate(90deg);
    -o-transform: rotate(90deg);
    writing-mode: tb-rl;
	margin-right:-55px;
}

a.trigger:hover{
//position: absolute;
text-decoration: none;
//top: 80px; right: 0;
position:fixed;
top:40%; right:0px;
font-size: 16px;
letter-spacing:-1px;
font-family: verdana, helvetica, arial, sans-serif;
color:#fff;
padding: 20px 20px 20px 40px;
font-weight: 700;
background:#222222 url(/images/plus.png) 15% 50% no-repeat;
border:1px solid #444444;
-moz-border-radius-topleft: 20px;
-webkit-border-radius: 20px;
-moz-border-radius-bottomleft: 20px;
-webkit-border-bottom-left-radius: 20px;
-moz-border-radius-bottomright: 0px;
display: block;
-moz-transform: rotate(90deg);
    -webkit-transform: rotate(90deg);
    -o-transform: rotate(90deg);
    writing-mode: tb-rl;
	
	margin-right:-55px;
}

a.active.trigger {
background:#222222 url(/images/minus.png) 15% 50% no-repeat;
z-index:101;
}
	
	</style>   
</head>
<body>
<div class="container-fluid">
    <div class="row-fluid">
	<div class="span3">
	
		<div class="well sidebar-nav" style="padding:0; height: 200px; border:2px solid green;padding:0;<?php if (!isset($iu)){echo "display:none;";}?>" >
			
            <div id="myCarousel" class="carousel slide" style="position:relative; height:100%;-moz-box-shadow:0 0 10px green; -webkit-box-shadow:0 0 10px green;box-shadow:0 0 10px green;">
                <div class="carousel-inner" style="position:relative; height:100%;">
                    <!--<div style="position:relative; height:100%;" class="active item"><img style="position:relative; height:100%;" src="/media/developments/<?php //echo $dev[0]['document']?>"><div class="carousel-caption"> <a href="http://kanikuly.sfedu.ru/events/<?php //echo $dev[0]['id']?>"><h6><?php //echo $dev[0]['name']?></h6></a></div></div>
                   <div style="position:relative; height:100%;" class="item"><img style="position:relative; height:100%;" src="/media/developments/<?php //echo $dev[1]['document']?>"><div class="carousel-caption"> <a href="http://kanikuly.sfedu.ru/events/<?php //echo $dev[1]['id']?>"><h6><?php //echo $dev[1]['name']?></h6></a></div></div>
                   <div style="position:relative; height:100%;" class="item"><img style="position:relative; height:100%;" src="/media/developments/<?php //echo $dev[2]['document']?>"><div class="carousel-caption"> <a href="http://kanikuly.sfedu.ru/events/<?php //echo $dev[2]['id']?>"><h6><?php //echo $dev[2]['name']?></h6></a></div></div>
                --></div>
                <!-- Carousel nav -->
                <a class="carousel-control left" href="#myCarousel" style="font-size: 40px;width: 30px;height: 30px; line-height: 25px;left: 5px;" data-slide="prev">&lsaquo;</a>
                <a class="carousel-control right" href="#myCarousel" style="font-size: 40px;width: 30px;height: 30px; line-height: 25px;right: 5px;" data-slide="next">&rsaquo;</a>
            </div> 
        </div>
		
		<div id="sv" class="but" style="background:#FCECDC;margin-bottom: 10px; <?php if (isset($iu)){echo "display:none;";}?>">
			<div  class="hider" style="cursor: pointer"><div class="f" ><div style="float:left">&darr;</div>Вход<div style="float:right">&darr;</div></div><div class="t" style="display: none;"><div style="float:left">&uarr;</div>Вход<div style="float:right">&uarr;</div></div></div>
            <div  class="well sidebar-nav" style="paddint-right:10px;display: none; margin-bottom:0px;">
               
            <?php
                if(Yii::app()->user->isGuest){
                $this->renderPartial('login',array('model'=>new LoginForm));
                }
            ?>
            </div>
        </div>
		
		<div id="sv" class="well sidebar-nav" style="background:#FCECDC;border:2px solid green;padding:0;" >
            <div style="border-bottom: 2px solid green;float:top; text-align: center;font-size:20px;"><a href="http://sfedu.ru/www/news_2012" target="_blank">Последние новости ЮФУ<img style="padding-bottom:8px;" src="/kanikuly/images/logo1.png"/></a></div>
            <?php $this->renderPartial('rss');?>
        </div>
		<div style="clear:both;"></div>
		<!-- Погода -->
		<div id="sv" class="but" style="background:#FCECDC;margin-bottom: 10px;"><!-- Погода -->
                <div class="hider" style="cursor: pointer"><div class="f"><div style="float:left">&darr;</div>Погода<div style="float:right">&darr;</div></div><div class="t" style="display: none"><div style="float:left">&uarr;</div>Погода<div style="float:right">&uarr;</div></div></div>
                <div class="well sidebar-nav" style="display: none; height:100%; margin-bottom:0px;">
                    <a target="_blank" href="http://clck.yandex.ru/redir/dtype=stred/pid=7/cid=1228/*http://pogoda.yandex.ru/rostov-na-donu"><img src="http://info.weather.yandex.net/rostov-na-donu/2_white.ru.png" border="0" alt=""/><img width="1" height="1" src="http://clck.yandex.ru/click/dtype=stred/pid=7/cid=1227/*http://img.yandex.ru/i/pix.gif" alt="" border="0"/></a>
                    <br><a target="_blank" href="http://clck.yandex.ru/redir/dtype=stred/pid=7/cid=1228/*http://pogoda.yandex.ru/gelendgik"><img src="http://info.weather.yandex.net/gelendgik/2_white.ru.png" border="0" alt=""/><img width="1" height="1" src="http://clck.yandex.ru/click/dtype=stred/pid=7/cid=1227/*http://img.yandex.ru/i/pix.gif" alt="" border="0"/></a>
                    <br><a target="_blank" href="http://clck.yandex.ru/redir/dtype=stred/pid=7/cid=1228/*http://pogoda.yandex.ru/abrau-dyurso"><img src="http://info.weather.yandex.net/abrau-dyurso/2_white.ru.png" border="0" alt=""/><img width="1" height="1" src="http://clck.yandex.ru/click/dtype=stred/pid=7/cid=1227/*http://img.yandex.ru/i/pix.gif" alt="" border="0"/></a>
					<br><a target="_blank" href="http://clck.yandex.ru/redir/dtype=stred/pid=7/cid=1228/*http://pogoda.yandex.ru/chikola"><img src="http://info.weather.yandex.net/chikola/2_white.ru.png" border="0" alt=""/><img width="1" height="1" src="http://clck.yandex.ru/click/dtype=stred/pid=7/cid=1227/*http://img.yandex.ru/i/pix.gif" alt="" border="0"/></a>

                </div>
        </div><!-- Погода -->
        
        <div id="sv" class="well sidebar-nav" style="background:#FCECDC;border:2px solid green;padding:0;<?php if (!isset($iu)){echo "display:none;";}?>">
            <div rel="popover" data-content="Скачать квитанцию" id="popover">
                <div style="float:bottom;text-align:center; font-size:11pt;"><a href="http://kanikuly.sfedu.ru/doc/kvitancia.pdf" target="_blank"><i class="icon-print"></i>Квитанция на оплату путевки</a></div>
				<a href="http://kanikuly.sfedu.ru/doc/kvitancia.pdf"  target="_blank"><img style="margin-left: 17%; position:relative;" src="/kanikuly/images/kvit.png"> </a>
                
            </div>
        </div>
		
		

	</div><!-- sidebar -->
        
    <div class="span9">
		<div class="panel">
			<?php 
			$contact = new ContactForm;
			$this->renderPartial('contact', array('model'=>$contact,));
			?>
			<div style="clear:both;"></div>
		</div>
		<a class="trigger" href="#">Связь с нами</a>
        <div class="well sidebar-nav" style="background-image: url(/kanikuly/css/bg.gif); background-repeat:repeat; border:2px solid green;">
           
                 
		<?php echo $content; ?>
               
            </div>
    </div>

        <?php $this->endContent(); ?>
    </div>
</div>
</body>
</html>
