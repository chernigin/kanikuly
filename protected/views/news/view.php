<head>
	<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
</head>
<?php
$this->breadcrumbs=array(
	'Подробнее о новости "'.$model->name.'"',
);
?>
<?php if(Yii::app()->user->hasFlash('commentMessege')):?>
<div class="flag"><?php echo Yii::app()->user->getFlash('commentMessege')?></div>
<?php endif;?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="/jquery.fancybox/jquery.fancybox.css" media="screen" />
	<script type="text/javascript" src="/jquery.fancybox/jquery.easing.1.3.js"></script>
	<script type="text/javascript" src="/jquery.fancybox/jquery.fancybox-1.2.1.pack.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.flag').delay(5000).hide("slow");
			$("p a").fancybox();
		});
	</script>
	<script type="text/javascript" src="/js/waterwheelCarousel.js"></script>
    <script type="text/javascript">
      $(document).ready(function () {
            $('#carousel a#g').fancybox();  
        var carousel = $("#carousel").waterwheelCarousel({
          flankingItems: 3,
        
        });

        $('#prev').bind('click', function(){
            carousel.prev();
            return false;
        });
        
        $('#next').bind('click', function(){
            carousel.next();
            return false;
        });

      });
    </script>
        <script type="text/javascript" src="//yandex.st/share/share.js"
charset="utf-8"></script>

<style type="text/css">
/*      body {
        font-family:Arial;
        font-size:12px;
        background:#ededed;
      }*/
      .example-desc {
        margin:3px 0;
        padding:5px;
      }

      #carousel {
          width: 100%;
        //width:960px;
        border:1px solid #222;
        height:200px;
        position:relative;
        clear:both;
        overflow:hidden;
        background:#FFF;
      }
      #carousel img {
        visibility:hidden; /* hide images until carousel can handle them */
        cursor:pointer; /* otherwise it's not as obvious items can be clicked */
      }

      .split-left {
        width:450px;
        float:left;
      }
      .split-right {
        width:400px;
        float:left;
        margin-left:10px;
      }
      #callback-output {
        height:250px;
        overflow:scroll;
      }
      textarea#newoptions {
        width:430px;
      }
    </style>
</head>
<body>
<!--<h3 style="margin:0px;">Подробнее о новости "<?php //echo $model->name;?>"</h3>-->

<div class="hero-unit" style="position: relative; padding:10px;">
    <p style="float:left;padding: 0px; width:150px; height: 150px; margin-right:10px; margin-bottom: -5px;"> <a id="d" rel="group" title="<?php $model['name'];?>" href="/media/news/<?php echo $model['document'];?>"><img src="/media/news/<?php echo $model['document'];?>" class="img-rounded" /></a></p>
    <div><?php echo Yii::app()->dateFormatter->format('d MMMM yyyy, HH:mm(мск)', $model->date)?></div>
    <div style="font-size:14pt; color:red; margin-bottom:2px;border-bottom:2px solid blue; border-top:2px solid blue;"><b> <?php echo $model['name']?></b></div>
    <div style="font-size:11pt;"><?php echo $model['details']?></div>
</div>

<div id="carousel" style="<?php if(empty($photo)) echo 'display:none;';?>margin-top:-10px;border: 2px solid CornflowerBlue; border-radius: 10px; background:rgb(226, 236, 252);">
        <h3 style="color:red;">Фотоотчет</h3>
        <?php foreach($photo as $p):?>
        <a id="g" rel="group" href="/media/gallery/photo/<?php echo $p['image'];?>"><img  style="width:160px; height: 120px;" src="/media/gallery/photo/<?php echo $p['image'];?>"  /></a>
      <?php  endforeach;?>
         <a class="carousel-control left" style="margin-top:70px;" href="#" id="prev">&lsaquo;</a>
		 <a class="carousel-control right" style="margin-top:70px;" href="#" id="next">&rsaquo;</a>
</div><br>

<?php if (Yii::app()->user->id ) {
     echo '<div id="comments" style="display:block;"><div id="border_comment"><div id="background_label_comment" style="font-size:12pt; color:red;"><b>Комментарии:</b></div></div>';
   
 }

 ?>
<!--<div id="comments">-->
    <?php if($model->commentCount()>=1): ?>
        
 
        <?php
        $criteria = new CDbCriteria ();
             $criteria->params=array(
            ':news_id'=>$model->id,
                 ':status'=> 2,);
        $criteria->condition='news_id=:news_id AND status=:status';
        $criteria->order='create_time DESC';
        $comm= Comment::model()->findAll($criteria);
        $this->renderPartial('_comments',array(
            'model'=>$model,
            'comments'=> $comm,//$model->comments,
        )); 
        ?>
<?php else: echo "<div class='alert alert-info'> К этой новости нет комментариев. Хотите быть первым?</div>"?>
    <?php endif; ?>
   <div><br>
      <div> <div id="border_comment" style="margin-top:5px;"><div id="background_label_comment" style="font-size:12pt; color:red;"><b>Оставить комментарий:</b></div></div>
     
    <?php if(Yii::app()->user->hasFlash('commentSubmitted')): ?>
        <div class="flash-success">
            <?php echo Yii::app()->user->getFlash('commentSubmitted'); ?>
        </div>
    <?php else: ?>
      
          <div>
        <?php
                $this->renderPartial( 'application.views.comment._form',array(
			'model'=> new Comment, 
                        'news'=> $model->id,
		));
	
                ?>
          </div>
        <?php //$this->renderPartial('/comment/_form',array(
            //'model'=>$comments,
        //)); ?>
    <?php endif;
    echo '</div></div></div>';
    ?>  
 
 
<div class="yashare-auto-init" data-yashareL10n="ru"
 data-yashareType="icon" data-yashareQuickServices="yaru,vkontakte,facebook,twitter,odnoklassniki,moimir">
</div> 
</body>
</html>
