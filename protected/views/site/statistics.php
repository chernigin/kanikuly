<div style="border:1px solid blue; padding: 10px; font-size:12pt;">
<?php
echo date("d.m.y, H:i:s").' (Мск)';?><br>
<?php
echo 'Зарегистрировано: <b>'.$user[0]['user'].'</b>';?><br>
<?php
echo 'Подано заявок: <b>'.$request[0]['request'].'</b>';
?>
</div>
<div style="border:1px solid red; margin-top:10px; padding:5px;">
<?php
/*print_r($r);


foreach($r as $key => $value) {
 echo $value['c'], '<br />';
}*/
//print_r($taimazi);
//echo array_sum ($liman);
$sum_liman=0;
$sum_taimasi=0;
?>
<style>
	td{border:1px solid black; text-align: center; }
	#name_smena td {font-weight:bold;}
	table{background: rgb(253, 255, 195);}
</style>
<table style="margin-top:15px;">
<tr id="name_smena"><td colspan="5">Лиманчик</td></tr>
<tr id="name_smena"><td>1 смена</td><td>2 смена</td><td>3 смена</td><td>4 смена</td><td>Всего</td></tr>
<tr>
<?php foreach($liman as $l):
//$res += $l['d'];?>
<td><?php echo $l['d'];?></td>
<?php $sum_liman += $l['d'];?>
<?php endforeach;?>
<td><?php echo $sum_liman;?></td>
</tr>
</table>
<table>
<tr id="name_smena"><td colspan="5">Витязь</td></tr>
<tr id="name_smena"><td>1 смена</td><td>2 смена</td><td>3 смена</td><td>4 смена</td><td>Всего</td></tr>
<tr>
<?php foreach($vityaz as $t):?>
<td><?php echo $t['d'];?></td>
<?php $sum_taimasi += $t['d'];?>
<?php endforeach;?>
<td><?php echo $sum_taimasi;?></td>
</tr>
</table>
<?php if(empty($taimazi)) echo 'Таймази: 0</br>';?>
<table>
	<tr id="name_smena"><td colspan="2">Таймази</td></tr>
	<tr id="name_smena">
		<td>Период</td>
		<td>Подано заявок</td>
	</tr>
	<?php foreach($taimazi as $t):?>
	<tr>
		<td><?php echo $t['p1'].' - '.$t['p2'];?></td>
		<td><?php echo $t['c'];?></td>
	</tr>
	<?php endforeach;?>
</table>
</div>
<div style="margin-top:20px;">
	<table>
		<tr id="name_smena"><td colspan="2">По факультетам</td></tr>
		<tr id="name_smena"><td>Название факультета</td><td>Количество поданых заявок</td></tr>
		<?php foreach($faculty as $f):?>
		<tr>
			<td>
				<?php echo $f['name'];?>
			</td>
			<td>				
				<?php echo $f['cc'];?>
			</td>
		</tr>
		<?php endforeach;?>
	</table>
</div>
