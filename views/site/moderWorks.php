<?php /*
if($_COOKIE["login"]!="dir"){echo "Please, <a href='index.php'>login</a>";exit;}*/
?>
<?php
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
	<link rel="stylesheet" href="style.css">
	<meta charset="UTF-8">

	<title>Расход ГСМ</title>


</head>
<body>





	<form action="<?php echo $_SERVER['PHP_SELF']?>" method=post>
			<a href="moder.php">Назад</a><br>
			<select name="object" style='font-size:14pt' >
				<option  disabled selected class="hid">Выберите объект</option>
				<option value="все участки">показать по всем объектам</option>
				<? error_reporting(-1);
			header('Content-Type: text/html; charset=utf-8');

			  include("db.php");
			  mysql_query("SET NAMES 'utf8';");
			  mysql_query("SET CHARACTER SET 'utf8';");
			  mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
			  $q = mysql_query("select object from objects")or die (mysql_error()) ;
			  while($r = mysql_fetch_array($q)) {
			  	echo "<option value='$r[object]'>$r[object]</option>";
			  }

			  ?>
		</select><br>




		<br>

		     <input type="checkbox" name="galka" >Показать за весь период<br><br>
		    <label>Начало</label>
		    <input type="date" name="dateS">
		    <label>Конец</label>
		    <input type="date" name="datePo"><br>
		    <input style="background-color: #6ef917;" type=submit name=enter value=Показать><br>


	</body>
</html>

<?php
if(isset($_POST["enter"]))
{
	include("db.php");
	 mysql_query("SET NAMES 'utf8';");
     mysql_query("SET CHARACTER SET 'utf8';");
     mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
	$object = $_POST["object"];



	$dateS = @$_POST["dateS"];
	$datePo = @$_POST["datePo"];
	if(empty($object)){echo "<b style='font-size:20px;color:red;'>Выберите объект!</b>";exit;}
	if($object == "все участки") {
		if(!empty($_POST['galka'])) {$q = mysql_query("select * from works order by date DESC")or die (mysql_error());
		}else{
			if (empty ($dateS)) {echo "<b style='font-size:20px;color:red;'>! Укажите дату</b>";exit;}
    		if (empty ($datePo)) {echo "<b style='font-size:20px;color:red;'>! Укажите дату</b>";exit;}
   			 $q = mysql_query("select * from works where date>='$dateS' and date<='$datePo' order by date DESC ")or die (mysql_error()) ;}
   	} else {
   		/*if($car=="Выберите ТС"){echo "<b style='font-size:20px;color:red;'>Выберите ТС!</b>";exit;}*/


			if(!empty($_POST['galka'])){
				$q = mysql_query("select * from works where object='$object' order by date DESC")or die (mysql_error()) ;
			}else{
				if (empty ($dateS)) {echo "<b style='font-size:20px;color:red;'>! Укажите дату</b>";exit;}
    			if (empty ($datePo)) {echo "<b style='font-size:20px;color:red;'>! Укажите дату</b>";exit;}
				$q = mysql_query("select * from works where object='$object' and date>='$dateS' and date<='$datePo' order by date DESC")or die (mysql_error()) ;}

	}


    echo "<table style='font-size:15pt' border=1 width=75%>";

  		echo "<tr style='font-size:17pt'><th>Объект</th><th>Выполенные работы:</th><th>Дата</th></tr>";



     		while($r = mysql_fetch_array($q))

     			{echo  "<tr><td width=10%>$r[object]</td>
  	   					<td style='max-width: 300px; word-wrap: break-word;'> $r[work] </td>
  	   					<td width=13%>$r[date]</td>

     					</tr>";}
            /*$bigSum= array_sum($all_sum);// вывод суммы литров*/








}
?>