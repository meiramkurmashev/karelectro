<?php include("fon.php");?>

<?php if($_COOKIE["login"]!="madiyar"){echo "Please, <a href='index.php'>login</a>";exit;}?>
<?php 
  error_reporting(-1);
  header('Content-Type: text/html; charset=utf-8'); 
?>
<!doctype=html>
<html lang="en">
<head>
  <meta charset="utf-8"> 
  <link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
  <link href="style.css" rel="stylesheet">
  <meta charset="UTF-8">
<title>Добавление/удаление ТС</title>
</head>

<body>
  <form class="oilForm" action="<?php echo $_SERVER['PHP_SELF']?>" method=post>
		<a href="oil.php">Назад</a><br>
		<a href="addCar.php">Добавить ТС в автопарк</a><br>
		<a href="deleteCar.php">Удалить ТС из автопарка</a><br>
    </form>
</body>

</html>