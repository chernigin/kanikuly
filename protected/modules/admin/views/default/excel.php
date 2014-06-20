<?php
	mysql_connect ("db.kanikuly.sfedu.ru", "kanikuly","PIU31orB%Calk");//подключение к серверу
	mysql_select_db("kanikuly") or die (mysql_error());//выбор базы данных
	mysql_query('SET character_set_database = utf8'); 
	mysql_query ("SET NAMES 'utf8'");
	error_reporting(E_ALL); 
	ini_set("display_errors", 1);
	
if( !defined( "ExcelExport" ) ) {
 define( "ExcelExport", 1 );
   class ExportToExcel {
	var $xlsData = ""; 
	var $fileName = ""; 
	var $countRow = 0; 
	var $countCol = 0; 
	var $totalCol = 8;//общее число  колонок в Excel
		//конструктор класса
	function __construct (){
		$this->xlsData = pack( "ssssss", 0x809, 0x08, 0x00,0x10, 0x0, 0x0 );
	}
		// Если число
	function RecNumber( $row, $col, $value ){
		$this->xlsData .= pack( "sssss", 0x0203, 14, $row, $col, 0x00 );
		$this->xlsData .= pack( "d", $value );
		return;
	}
		//Если текст
	function RecText( $row, $col, $value ){
		$len = strlen( $value );
		$this->xlsData .= pack( "s*", 0x0204, 8 + $len, $row, $col, 0x00, $len);
		$this->xlsData .= $value;
		return;
	}
		// Вставляем число
	function InsertNumber( $value ){
		if ( $this->countCol == $this->totalCol ) {
			$this->countCol = 0;
			$this->countRow++;
		}
		$this->RecNumber( $this->countRow, $this->countCol, $value );
		$this->countCol++;
		return;
	}
		// Вставляем текст
	function InsertText( $value ){
		if ( $this->countCol == $this->totalCol ) {
			$this->countCol = 0;
			$this->countRow++;
	}
		$this->RecText( $this->countRow, $this->countCol, $value );
		$this->countCol++;
		return;
	}
		// Переход на новую строку
	function GoNewLine(){
		$this->countCol = 0;
		$this->countRow++;
		return;
		}
		//Конец данных
	function EndData(){
		$this->xlsData .= pack( "ss", 0x0A, 0x00 );
		return;
	}
		// Сохраняем файл
	function SaveFile( $fileName ){
		$this->fileName = $fileName;
		$this->SendFile();
	}
		// Отправляем файл
	function SendFile(){
		$this->EndData();
		header ( "Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT" );
		header ( "Cache-Control: no-store, no-cache, must-revalidate" );
		header ( "Pragma: no-cache" );
		header ( "Content-type: application/x-msexcel" );
		header ( "Content-Disposition: attachment; fileName=$this->fileName.xls" );
		print $this->xlsData;
	 }
	} 
}
	
		//фильтруем данные
//$id = mysql_real_escape_string(stripslashes(trim(htmlspecialchars($_GET['id'],ENT_QUOTES))));
		$filename = 'СтудентыПутевка'; // задаем имя файла
		$excel = new ExportToExcel(); // создаем экземпляр класса
		$sql="select f.name as faculty, name_student,surname,phone,email,period1,period2,putevka from faculty as f  join (select s.surname,s.name as name_student,s.phone,s.email,s.faculty,period1,period2,g2.name as putevka,g2.date,student from student as s join (select period1,period2,name,student,date from period as per join (select p.name,r.student,r.period,r.date from putevka as p join request as r on p.id = r.putevka) as g1 on per.id = g1.period)as g2 on s.id = g2.student where s.surname IS NOT NULL)as g3 on f.id= g3.faculty";//запрос к базе
		mysql_query("set names cp1251"); 
                $rez=mysql_query($sql);
		$excel->InsertText('name');
		$excel->InsertText('surname');
		$excel->InsertText('phone');
		$excel->InsertText('email');
		$excel->InsertText('faculty');
		$excel->InsertText('putevka');
		$excel->InsertText('period from');
		$excel->InsertText('period to');
		$excel->GoNewLine();
	While($row=mysql_fetch_assoc($rez)){
		$excel->InsertText($row['name_student']);
		$excel->InsertText($row['surname']);
		$excel->InsertText($row['phone']);
		$excel->InsertText($row['email']);
		$excel->InsertText($row['faculty']);
		$excel->InsertText($row['putevka']);
		$excel->InsertText($row['period1']);
		$excel->InsertText($row['period2']);
		$excel->GoNewLine();
	}
	$excel->SaveFile($filename);
 
?>
