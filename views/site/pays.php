<?php
include("fon.php");?>
<?php /*if($_COOKIE["login"]!="buh"){echo "Please, <a href='index.php'>login</a>";exit;} */?>

<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
	<link href="style.css" rel="stylesheet">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Добавить платежное поручение</title>
</head>
<body>



		<a href="paysInfo.php">Информация о платежных поручениях</a><br>

		<form    action="<?php echo $_SERVER['PHP_SELF']?>" method=post enctype='multipart/form-data'>
		Название: <input name="name" type="text" style="width:24%"><br>
		Файл: <input type=file name=photo><br>
		Дата:  <input type="date" name="date" class="form-control" id="date"><br>
		Комментарий:<br><textarea name="comment" style="width:30%; height:80px; font-family: Arial; font-size: 14px"></textarea><br>
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
	/*echo $_FILES['photo']['tmp_name'];*/
	$name = $_POST["name"];
	if (empty($name)){echo "<b><span style='font-size: 20px;color:#ce1212'>! Введите имя платежа</span></b>";exit;}
	if (!empty($_FILES["photo"]["tmp_name"]))
	{
		if ($_FILES['photo']['size'] > 2*1024*1024){echo "<b><span style='font-size: 20px;color:#ce1212'>! Файл большого размера</span></b>";exit;}
		/*move_uploaded_file($_FILES['photo']['tmp_name'], 'temp/'.$_FILES['photo']['name']);*/

		$photo = pathinfo($_FILES['photo']['name'], PATHINFO_FILENAME);

		$extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);

		$date = date('Y-m-d!H:i:s');

		$photofinish = $photo . '-' . $date . '.' . $extension;
		move_uploaded_file($_FILES['photo']['tmp_name'], 'temp/'.$photofinish);
       	/*$photo=$_FILES["photo"]["name"];*/

    } else {echo "<b><span style='font-size: 20px;color:#ce1212'>! Выберете файл</span></b>";exit;}


	$date = $_POST["date"];
	$comment = $_POST["comment"];


	if (empty($date)){echo "<b><span style='font-size: 20px;color:#ce1212'>! Введите дату</span></b>";exit;}

	mysql_query("insert into pays(name,photo,date,comment) values('$name','$photofinish','$date','$comment')")or die (mysql_error());
	echo "<b><span style='font-size: 20px;color:#33e61e'>Добавлено!</span></b>";
	echo "<script>setTimeout('location=\"pays.php\"',1000)</script>";

}

?>