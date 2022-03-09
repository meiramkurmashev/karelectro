<?php
include("fon.php");?>
<?php /* if($_COOKIE["login"]!="madiyar"){echo "Please, <a href='index.php'>login</a>";exit;}*/ ?>

<?php
function getData($default1 = '') {
    if (isset($_POST['date'])) {
        setcookie('date', $_POST['date'],time() + (3600 * 24 * 1));
        return $_POST['date'];
    }
    elseif (isset($_COOKIE['date'])) {
        return $_COOKIE['date'];
    }
    return $default1;
}
$data = getData();

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
	<link href="style.css" rel="stylesheet">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Учет ГСМ</title>
</head>
<body>


			<a href="oilChange.php">Внести изменения ГСМ</a><br>

		<a href="cars.php">Автопарк ТОО "Карэлектроспецстрой"</a><br>
			<a href="addOrDeleteCar.php">Добавить/удалить ТС из автопарка</a><br>
	<a href="addObject.php">Добавить УЧАСТОК</a><br>
		<a href="carChange.php">Внести изменения УЧАСТОК</a><br>

		<form    action='oil.php' method=post>
		<fieldset style="width: 20%;"><legend>Участок и ТС</legend>
		<select <?php if(isset($_POST['ok'])){ echo "style='display:none'"; } ?> name="object" onchange="if (self.OBJ) OBJ.style.display = 'none';
			if(this.value) OBJ = document.getElementById (this.value),
				OBJ.style.display = 'block'; else OBJ = null">
			<option disabled selected class="hid"><?php echo $object?></option>
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
			function getObject($default12 = 'Выберете участок') {
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

					echo "<form  action='oil.php' method=post>";
					if(isset($_POST["ok"])){
					echo "Выбранный участок: <br><input size=7px name='object1' readonly type='text' value='$object'><button type='reset' onClick='window.location.href=window.location.href;' name='nazad'>изменить</button><br>";}
		if(isset($_POST["ok"])){echo "TC: <br><select name='car' id='<?php echo $object?>' style=display: none   >";
			echo "<option disabled selected class='hid'></option>";
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

		?>

	</fieldset><br>

		<label for="date" class="form-label">Дата</label>
   		<input type="date" name="date" class="form-control" id="date" value=<?php echo "$data"?>><br><br>
		<label for="">Расход: </label><input name="oil" type="text" style="width:5%"> л.<br>
		<label for="">Комментарий</label><br><textarea name="comment" style="width:20%; height:80px; font-family: Arial; font-size: 14px"></textarea><br>
		<input  type=submit name=enter value="Внести">
	</form>
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

	$date = $_POST["date"];
	$oil = $_POST["oil"];
	$comment = $_POST["comment"];
	if (empty($object)){echo "<b><span style='font-size: 20px;color:#ce1212'>! Выберете объект</span></b>";exit;}
	if (empty($car)){echo "<b><span style='font-size: 20px;color:#ce1212'>! Выберете ТС</span></b>";exit;}
	if (empty($date)){echo "<b><span style='font-size: 20px;color:#ce1212'>! Введите дату</span></b>";exit;}
	if (empty($oil)){echo "<b><span style='font-size: 20px;color:#ce1212'>! Введите расход ГСМ</span></b>";exit;}
	mysql_query("insert into oil(object,car,date,oil,comment) values('$object','$car','$date','$oil','$comment')")or die (mysql_error());
	echo "<b><span style='font-size: 20px;color:#33e61e'>Добавлено!</span></b>";
	echo "<script>setTimeout('location=\"oil.php\"',1000)</script>";

}

?>