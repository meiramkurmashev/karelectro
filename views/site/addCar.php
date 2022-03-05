<?php include("fon.php");?>

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
<title>Добавление ТС</title>
</head>

<body>
  <form class="oilForm" action="<?php echo $_SERVER['PHP_SELF']?>" method=post>
		<a href="addOrDeleteCar.php">Назад</a><br>
		<label for="detail" class="form-label">Объект</label><input type="" name="carObject"><br>
    <label for="detail" class="form-label">Наименование ТС</label><input type="" name="carName"><br>
    <label for="detail" class="form-label">Тип ТС</label><select name="carType" onchange="if (self.OBJ) OBJ.style.display = 'none';
                        if (this.value) OBJ = document.getElementById (this.value),
                        OBJ.style.display = 'block'; else OBJ = null">
    <option  disabled selected class="hid"></option>
          <option value="Авто кран">Авто кран</option>
          <option value="АГП (ТВ)">АГП (ТВ)</option>
          <option value="Манипулятор">Манипулятор</option>
          <option value="МРК">МРК</option>
          <option value="Ямобур">Ямобур</option>
          <option value="Бензовоз">Бензовоз</option>
          <option value="Водовоз">Водовоз</option>
          <option value="Самосвал">Самосвал</option>
          <option value="Вахтовка">Вахтовка</option>
          <option value="Лафет">Лафет</option>
          <option value="Прицепы">Прицепы</option>
          <option value="Тягач">Тягач</option>
          <option value="микроавтобус">микроавтобус</option>
          <option value="Бульдозер">Бульдозер</option>
          <option value="Мини-погрузчик">Мини-погрузчик</option>
          <option value="Фронтальный погрузчик">Фронтальный погрузчик</option>
          <option value="Эксковатор">Эксковатор</option>
          <option value="Трактор">Трактор</option>
          <option value="легковые">легковые</option>
          <option value="другое">(другое)</option>
        </select><br>
    <label for="detail" class="form-label">Год выпуска</label><input type="" name="carYear"><br>
    <label for="detail" class="form-label">Водитель 1</label><input type="" name="carDriver1"><br>
    <label for="detail" class="form-label">Водитель 2</label><input type="" name="carDriver2"><br>
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
  $q = mysql_query("select * from cars ")or die (mysql_error()) ;
 
    $carObject  = $_POST["carObject"]  ; //продолжается сокращение переменных, из поста в новые
   $carName    =     $_POST["carName"]  ;
   $carType =     $_POST["carType"]      ;
   $carYear = $_POST["carYear"]  ;
   $carDriver1 =  $_POST["carDriver1"]   ;
   $carDriver2 =  $_POST["carDriver2"]   ;
     if (isset($_POST["enter"]))
     {
           if (empty ($carObject)) {echo "<h3 style='color:red'>Не указан указан объект, попрубуйте снова<h3>";exit;}
   if (empty ($carName)) {echo "<h3 style='color:red'>Не указан указано наименование ТС, попрубуйте снова<h3>";exit;}
   if (empty ($carType)) {echo "<h3 style='color:red'>Не указан указан тип ТС, попрубуйте снова<h3>";exit;}
  if (empty ($carYear)) {echo "<h3 style='color:red'>Не указан год выпуска, попрубуйте снова<h3>";exit;}
 
          //print_r($_POST);
           mysql_query("insert into cars(carObject,carName,carType,carYear,carDriver1,carDriver2)
   values('$carObject','$carName','$carType','$carYear','$carDriver1','$carDriver2')")or die (mysql_error()) ;
     echo "<h2 style='color:#91ff00'>Добавлено</h2>";
    echo "<script>setTimeout('location=\"addCar.php\"',1000)</script>";
}
?>  
     
