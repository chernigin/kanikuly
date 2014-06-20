<table width="100%" > 	
	<?php $url = "http://sfedu.ru/www/rssnews.rss";   //адрес RSS ленты

	$rss = simplexml_load_file($url);   //Интерпретирует XML-файл в объект
	$rss_RSSmax=4;
	for($itemNum=0;$itemNum<$rss_RSSmax;$itemNum++){?>
	 <tr style='margin-bottom: 5px;' >
	   <td style="padding: 0px; width: 35px;">
	   <?php  //echo (date("j.m",strtotime($rss->channel->item[$itemNum]->pubDate))); ?>
		</td> 
		<td><a target="_blank" href="<?php echo $rss->channel->item[$itemNum]->link; ?>"> 
		  <?php  
		echo $rss->channel->item[$itemNum]->title;?></a>
			</td> 
	</tr>
	<?php }?>
</table>	
