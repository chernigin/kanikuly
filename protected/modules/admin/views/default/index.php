<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<head>
    <style>
       a:link { text-decoration: none;} 
	#butExcel{color: #ffffff;
	background-color: #bd362f;
	width:70px;}
    </style>
</head>
<h1>Статистика</h1>

<?php Yii::app()->clientScript->registerCoreScript('jquery');?>
<?php echo CHtml::dropDownList('pselect',$p_id, CHtml::listData(Putevka::model()->findAll(), 'id', 'name'),array('id'=>'pselect'));?>
<script>
$(function(){
		
	

		function changehandler()
		{
			var pid=$(this).val();
		
			var url = location.href;
			var url_parts = url.split('?');
			var main_url = url_parts[0];
			location.replace(main_url+'?p_id='+pid)
		}
		
		$('#pselect').change(changehandler)		
	})
</script>
<?php echo CHtml::button('Excel', array('id'=>'butExcel','submit' => array('excel'))); ?>
<table>
    <tr><td>Фамилия</td><td>Имя</td><td>Факультет</td>
<?php


        foreach($res as $row):?>
                                         <tr>
						<td><?php echo $row['surname']?></td>
                                                <td><?php echo $row['name']?></td>
                                                <td><?php echo $row['fuc']?></td>
					</tr>
                                        
	

      <?php  endforeach;?>

</table>
