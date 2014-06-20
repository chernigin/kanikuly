<div id="comments">
   
 <?php foreach ($comments as $c): ?>
 <div style="border-bottom: 1px #002a80 dotted;padding-bottom: 5px;padding-top: 5px;">
   <div style="float:left; width: 90%;">  
    <div>
     <?php
     $text= $c->content; 
     
    
     echo "<ul><li type='disc'  style='font-size:110%;margin-left:15px; color: red;'><span style='color:#555;'>".$text."</span></li></ul>";
     ?> 
    </div>
    <div style="margin-top:8px;">
         <span>
            &nbsp;&nbsp;&nbsp;
            <b>
                Автор:&nbsp;
            </b>
                <span style="color: #0044cc;">
                    <?php echo CHtml::encode($c->user->name).' '.CHtml::encode($c->user->surname);?>
                 </span>   
         </span>   
        <span >
            &nbsp;&nbsp;&nbsp;
            <b>
                Дата:&nbsp;
            </b>
            <span style="color: #0044cc;">
                <?php echo   Yii::app()->dateFormatter->format('d MMMM yyyyг. HH:mm(мск)', $c->create_time)?>
        
            </span>
        </span>      
    </div>
  </div>  
   
     <div style="clear: both; height: 0px;"></div>
    </div>
  <?php endforeach;?>
</div>