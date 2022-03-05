<?php  if($_COOKIE["login"]!="madiyar"){echo "Please, <a href='index.php'>login</a>";exit;}?>
<?php 
  error_reporting(-1);
  header('Content-Type: text/html; charset=utf-8'); 
?><!doctype=html>
<html lang="en">
<head>
  <meta charset="utf-8"> 
  <link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
  <link href="style.css" rel="stylesheet">
  <meta charset="UTF-8">
<title>Добавление Участка</title>
</head>

<body>
  <form class="oilForm" action="<?php echo $_SERVER['PHP_SELF']?>" method=post>
		<a href="oil.php">Назад</a><br>
		<label for="detail" class="form-label">Введите название объекта:</label><input type="" name="object"><br>
    
    <button    name="enter" color=green type="submit" >Добавить</button>
  </form>
</body>
</html>
	<?php error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');
  
  include("db.php");
  mysql_query("SET NAMES 'utf8';");
  mysql_query("SET CHARACTER SET 'utf8';");
  mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
  $q = mysql_query("select * from objects ")or die (mysql_error()) ;
   
    $object  = $_POST["object"]  ; //продолжается сокращение переменных, из поста в новые
  
     if (isset($_POST["enter"]))
     {
           if (empty ($object)) {echo "<h3 style='color:red'>Неверное указан объект, попрубуйте снова<h3>";exit;}
  
          mysql_query("insert into objects(object)
   values('$object')")or die (mysql_error()) ;//запись в таблицу details соответствующих значений из формы
     echo "<h2 style='color:#91ff00'>Добавлено</h2>";
    echo "<script>setTimeout('location=\"addObject.php\"',1000)</script>";
}
?>  
     
