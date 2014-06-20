<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>  
<?php
$this->breadcrumbs = array(
    'Галерея' => array('gallery'),
    'Фото',
);
?>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta http-equiv="imagetoolbar" content="no" />
    <link rel="stylesheet" type="text/css" href="/jquery.fancybox/jquery.fancybox.css" media="screen" />

    <script type="text/javascript" src="/jquery.fancybox/jquery.easing.1.3.js"></script>
    <script type="text/javascript" src="/jquery.fancybox/jquery.fancybox-1.2.1.pack.js"></script>
    <script type="text/javascript">
$(document).ready(function(){
    $(document).on('mouseenter', 'p a', function(e){
        e.preventDefault();
        $(this).fancybox();
    });
});
//$(document).ready(function() {
//			$("p a").fancybox();
//		});
        
    
    </script>

    <style>
        html, body {
            font: normal 11px Tahoma;
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

        img#g {
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
    <h2 style="text-align:center;">Фото из альбома "<?php echo $album->name; ?>"</h2> 

    <div id="wrap">          
       
        <p style="position:relative; width: 100%;">
                <?php foreach ($photo as $p): ?>
                <a id="d" rel="group" title="<?php echo $p['name']; ?>" href="/media/gallery/photo/<?php echo $p['image']; ?>"><img id="g" src="/media/gallery/photo/<?php echo $p['image']; ?>" class="img-rounded" /></a>
<?php endforeach; ?>
        </p>
    </div>
    <?php
    $this->widget('ext.yiinfinite-scroll.YiinfiniteScroller', array(
        'contentSelector' => '#wrap p',
        'itemSelector' => '#wrap p',
        'loadingText' => 'Loading...',
        'donetext' => 'Больше нет фотографий',
        'pages' => $pages,
    ));
    ?>