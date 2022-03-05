<?php
include("fon.php");?>
<?php
if($_COOKIE["login"]!="dir"){echo "Please, <a href='index.php'>login</a>";exit;}
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
			<select <?php if(isset($_POST['ok'])){ echo "style='display:none'"; } ?> name="object" onchange="if (self.OBJ) OBJ.style.display = 'none';
				if(this.value) OBJ = document.getElementById (this.value),
					OBJ.style.display = 'block'; else OBJ = null">
				<option disabled selected class="hid">Выберите объект</option>
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
			function getObject($default12 = 'Выберите участок') {
			    if (isset($_POST['object'])) {
			        setcookie('object', $_POST['object'],time() + (3600 * 24 * 1));
			        return $_POST['object'];
			    }
			    elseif (isset($_COOKIE['object'])) {
			        return $_COOKIE['object'];
			    }
			    return $default12;
			}
			$object = getObject();
			  ?>
		</select><br>
		<button type="submit" <?php if(isset($_POST['ok'])){ echo "style='display:none'"; } ?> name="ok">показать</button>
		</form>
		<?php

			if(isset($_POST["ok"]))
			{


				include("db.php");
				mysql_query("SET NAMES 'utf8';");
				mysql_query("SET CHARACTER SET 'utf8';");
				mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
				;}

					echo "<form  action='moderOil.php' method=post>";
					if(isset($_POST["ok"])){
					echo "Выбранный участок: <br><input size=7px name='object1' readonly type='text' value='$object'><button type='reset' onClick='window.location.href=window.location.href;' name='nazad'>изменить</button><br>";}
		if(isset($_POST["ok"]) and $object!="все участки"){echo "TC: <br><select name='car' id='<?php echo $object?>' style=display: none   >";
			/*echo "<option disabled selected class='hid'>Выберите ТС</option>";*/
			echo "<option value='все $object'>все $object</option>";
			error_reporting(-1);
			header('Content-Type: text/html; charset=utf-8');

			  include("db.php");
			  mysql_query("SET NAMES 'utf8';");
			  mysql_query("SET CHARACTER SET 'utf8';");
			  mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
			  $q = mysql_query("select carName from cars where carObject='$object' ")or die (mysql_error()) ;
			  while($cars = mysql_fetch_array($q)) {
			  	echo "<option value='$cars[carName]'>$cars[carName]</option>";}

		echo '</select>';}

		?></fieldset><br><br>

		     <input <?php if(!isset($_POST['ok'])){ echo "style='display:none'"; } ?> type="checkbox" name="galka" ><span <?php if(!isset($_POST['ok'])){ echo "style='display:none'"; } ?>>Показать за весь период</span><br>
		    <label <?php if(!isset($_POST['ok'])){ echo "style='display:none'"; } ?>>Начало</label>
		    <input <?php if(!isset($_POST['ok'])){ echo "style='display:none'"; } ?> type="date" name="dateS">
		    <label <?php if(!isset($_POST['ok'])){ echo "style='display:none'"; } ?>>Конец</label>
		    <input <?php if(!isset($_POST['ok'])){ echo "style='display:none'"; } ?>type="date" name="datePo"><br>
		    <input <?php if(!isset($_POST['ok'])){ echo "style='display:none'"; } ?> style="background-color: #6ef917;" type=submit name=enter value=Показать><br>


	</body>
</html>

<?php
if(isset($_POST["enter"]))
{
	include("db.php");
	 mysql_query("SET NAMES 'utf8';");
     mysql_query("SET CHARACTER SET 'utf8';");
     mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
	$object = $_POST["object1"];

	$car=$_POST["car"];

	$dateS = @$_POST["dateS"];
	$datePo = @$_POST["datePo"];
	if(empty($object)){echo "<b style='font-size:20px;color:red;'>Выберите объект!</b>";exit;}
	if($object == "все участки") {
		if(!empty($_POST['galka'])) {$q = mysql_query("select * from oil order by date DESC")or die (mysql_error());
		}else{
			if (empty ($dateS)) {echo "<b style='font-size:20px;color:red;'>! Укажите дату</b>";exit;}
    		if (empty ($datePo)) {echo "<b style='font-size:20px;color:red;'>! Укажите дату</b>";exit;}
   			 $q = mysql_query("select * from oil where date>='$dateS' and date<='$datePo' order by date DESC ")or die (mysql_error()) ;}
   	} else {
   		/*if($car=="Выберите ТС"){echo "<b style='font-size:20px;color:red;'>Выберите ТС!</b>";exit;}*/

		if($car == "все $object"){
			if(!empty($_POST['galka'])){
				$q = mysql_query("select * from oil where object='$object' order by date DESC")or die (mysql_error()) ;
			}else{
				if (empty ($dateS)) {echo "<b style='font-size:20px;color:red;'>! Укажите дату</b>";exit;}
    			if (empty ($datePo)) {echo "<b style='font-size:20px;color:red;'>! Укажите дату</b>";exit;}
				$q = mysql_query("select * from oil where object='$object' and date>='$dateS' and date<='$datePo' order by date DESC")or die (mysql_error()) ;}
		}
		else{
		if(!empty($_POST['galka'])) {$q = mysql_query("select * from oil where object='$object' and car='$car' order by date DESC")or die (mysql_error());
		}else{
			if (empty ($dateS)) {echo "<b style='font-size:20px;color:red;'>! Укажите дату</b>";exit;}
    		if (empty ($datePo)) {echo "<b style='font-size:20px;color:red;'>! Укажите дату</b>";exit;}
   			 $q = mysql_query("select * from oil where object='$object' and car='$car' and date>='$dateS' and date<='$datePo' order by date DESC")or die (mysql_error()) ;}
   	}
	}


    echo '<table border=1 width=53%>';

  		echo "<tr><th>Объект</th><th>ТС</th><th>Дата</th><th>кол-во</th><th>комментарий</th></tr>";



     		while($r = mysql_fetch_array($q))

     			{echo  "<tr><td width=10%>$r[object]</td>
  	   					<td width=30%> $r[car] </td>
  	   					<td width=13%>$r[date]</td>
  	   					<td width=2% align='center'>$r[oil] </td>
     						<td >$r[comment] </td>
     					</tr>";;$all_sum [] = $r[oil];}
            $bigSum= array_sum($all_sum);// вывод суммы литров

	echo "<table border=1 width=53%> <th width=85% align='right'>Общее количество(л.):</th> <th>$bigSum л.</th></tr></table>";






}
?>