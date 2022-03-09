<?php include("fon.php");?>
<!doctype=html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
  <link href="style.css" rel="stylesheet">
  <meta charset="UTF-8">
<title>Учет деталей</title>
</head>
	<?php error_reporting(-1);
header('Content-Type: text/html; charset=utf-8'); //писал после обучения на php expert editor, но пошла непонятка с кодировками и нашел эту функцию,теперь норм. и пробую новое приложение, но уже в Sublim'е
?>
<?php /*if($_COOKIE["login"]!='erlan'){echo "Please, <a href='index.php'>login</a>";exit;}*/?>
<?php
//функция из гугла по кукам[самому не получилось как на курсах учили-выдавало ошибку](номеру счета и дате, ибо с листа заполнять постоянно не надо механикам)
function getNomerScheta($default = '') {
    if (isset($_POST['nomerSch'])) {
        setcookie('nomerSch', $_POST['nomerSch'],time() + (3600 * 24 * 1));
        return $_POST['nomerSch'];
    }
    //щяс если не получится то разделить ибо после формы
    elseif (isset($_COOKIE['nomerSch'])) {
        return $_COOKIE['nomerSch'];
    }
    return $default;
}
 //получилось: теперь с датой также
$nomerScheta = getNomerScheta();


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

<body>
<div>
  <img src='logo.jpg' alt="karelectro"> <h1 id='header-inner' align="center" >Добавление детали</h1>
</div>
<form class="forma" action="<?php echo $_SERVER['PHP_SELF']?>" method=post>
  <div>
      <fieldset><legend><label for="type" class="form-label">Тип ТС</label></legend>
  <div>
      <select name="type" onchange="if (self.OBJ) OBJ.style.display = 'none';
                        if (this.value) OBJ = document.getElementById (this.value),
                        OBJ.style.display = 'block'; else OBJ = null">
    <option  disabled selected class="hid">Выберите тип ТС</option>
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
        </select>
        </fieldset>
    </div>

    <fieldset><legend><label>ТС</label></legend>

      <select id="Авто кран" style="display: none" name="car1" >
         <option disabled selected class="hid"></option>
			<? error_reporting(-1);
			header('Content-Type: text/html; charset=utf-8');

			  include("db.php");
			  mysql_query("SET NAMES 'utf8';");
			  mysql_query("SET CHARACTER SET 'utf8';");
			  mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
			  $q = mysql_query("select carName from cars where carType='Авто кран' ")or die (mysql_error()) ;
			  while($cars = mysql_fetch_array($q)) {
			  	echo "<option value='$cars[carName]'>$cars[carName]</option>";}?>
        </select>

      <select id="АГП (ТВ)" style="display: none" name="car2" >
       <option  disabled selected class="hid"></option>
        <? error_reporting(-1);
			header('Content-Type: text/html; charset=utf-8');

			  include("db.php");
			  mysql_query("SET NAMES 'utf8';");
			  mysql_query("SET CHARACTER SET 'utf8';");
			  mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
			  $q = mysql_query("select carName from cars where carType='АГП (ТВ)' ")or die (mysql_error()) ;
			  while($cars = mysql_fetch_array($q)) {
			  	echo "<option value='$cars[carName]'>$cars[carName]</option>";}?>
       </select>


      <select id="Манипулятор" style="display: none" name="car3">
       <option  disabled selected class="hid"></option>
       <? error_reporting(-1);
			header('Content-Type: text/html; charset=utf-8');

			  include("db.php");
			  mysql_query("SET NAMES 'utf8';");
			  mysql_query("SET CHARACTER SET 'utf8';");
			  mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
			  $q = mysql_query("select carName from cars where carType='Манипулятор' ")or die (mysql_error()) ;
			  while($cars = mysql_fetch_array($q)) {
			  	echo "<option value='$cars[carName]'>$cars[carName]</option>";}?>
      </select>

      <select id="МРК" style="display: none" name="car4">
       <option disabled selected class="hid"></option>
			<? error_reporting(-1);
			header('Content-Type: text/html; charset=utf-8');

			  include("db.php");
			  mysql_query("SET NAMES 'utf8';");
			  mysql_query("SET CHARACTER SET 'utf8';");
			  mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
			  $q = mysql_query("select carName from cars where carType='МРК' ")or die (mysql_error()) ;
			  while($cars = mysql_fetch_array($q)) {
			  	echo "<option value='$cars[carName]'>$cars[carName]</option>";}?>
      </select>

      <select id="Ямобур" style="display: none" name="car5">
      <option disabled selected class="hid"></option>
			<? error_reporting(-1);
			header('Content-Type: text/html; charset=utf-8');

			  include("db.php");
			  mysql_query("SET NAMES 'utf8';");
			  mysql_query("SET CHARACTER SET 'utf8';");
			  mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
			  $q = mysql_query("select carName from cars where carType='Ямобур' ")or die (mysql_error()) ;
			  while($cars = mysql_fetch_array($q)) {
			  	echo "<option value='$cars[carName]'>$cars[carName]</option>";}?>
      </select>

      <select id="Бензовоз" style="display: none" name="car6">
       <option disabled selected class="hid"></option>
			<? error_reporting(-1);
			header('Content-Type: text/html; charset=utf-8');

			  include("db.php");
			  mysql_query("SET NAMES 'utf8';");
			  mysql_query("SET CHARACTER SET 'utf8';");
			  mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
			  $q = mysql_query("select carName from cars where carType='Бензовоз' ")or die (mysql_error()) ;
			  while($cars = mysql_fetch_array($q)) {
			  	echo "<option value='$cars[carName]'>$cars[carName]</option>";}?>
      </select>

      <select id="Водовоз" style="display: none" name="car7">
       <option disabled selected class="hid"></option>
			<? error_reporting(-1);
			header('Content-Type: text/html; charset=utf-8');

			  include("db.php");
			  mysql_query("SET NAMES 'utf8';");
			  mysql_query("SET CHARACTER SET 'utf8';");
			  mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
			  $q = mysql_query("select carName from cars where carType='Водовоз' ")or die (mysql_error()) ;
			  while($cars = mysql_fetch_array($q)) {
			  	echo "<option value='$cars[carName]'>$cars[carName]</option>";}?>
      </select>

      <select id="Самосвал" style="display: none" name="car8">
      <option disabled selected class="hid"></option>
			<? error_reporting(-1);
			header('Content-Type: text/html; charset=utf-8');

			  include("db.php");
			  mysql_query("SET NAMES 'utf8';");
			  mysql_query("SET CHARACTER SET 'utf8';");
			  mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
			  $q = mysql_query("select carName from cars where carType='Самосвал' ")or die (mysql_error()) ;
			  while($cars = mysql_fetch_array($q)) {
			  	echo "<option value='$cars[carName]'>$cars[carName]</option>";}?>
      </select>

      <select id="Вахтовка" style="display: none" name="car9">
       <option disabled selected class="hid"></option>
			<? error_reporting(-1);
			header('Content-Type: text/html; charset=utf-8');

			  include("db.php");
			  mysql_query("SET NAMES 'utf8';");
			  mysql_query("SET CHARACTER SET 'utf8';");
			  mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
			  $q = mysql_query("select carName from cars where carType='Вахтовка' ")or die (mysql_error()) ;
			  while($cars = mysql_fetch_array($q)) {
			  	echo "<option value='$cars[carName]'>$cars[carName]</option>";}?>
      </select>

      <select id="Лафет" style="display: none" name="car10">
       <option disabled selected class="hid"></option>
			<? error_reporting(-1);
			header('Content-Type: text/html; charset=utf-8');

			  include("db.php");
			  mysql_query("SET NAMES 'utf8';");
			  mysql_query("SET CHARACTER SET 'utf8';");
			  mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
			  $q = mysql_query("select carName from cars where carType='Лафет' ")or die (mysql_error()) ;
			  while($cars = mysql_fetch_array($q)) {
			  	echo "<option value='$cars[carName]'>$cars[carName]</option>";}?>
      </select>

      <select id="Прицепы" style="display: none" name="car11" >
      <option disabled selected class="hid"></option>
			<? error_reporting(-1);
			header('Content-Type: text/html; charset=utf-8');

			  include("db.php");
			  mysql_query("SET NAMES 'utf8';");
			  mysql_query("SET CHARACTER SET 'utf8';");
			  mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
			  $q = mysql_query("select carName from cars where carType='Прицепы' ")or die (mysql_error()) ;
			  while($cars = mysql_fetch_array($q)) {
			  	echo "<option value='$cars[carName]'>$cars[carName]</option>";}?>
      </select>

      <select id="Тягач" style="display: none" name="car12">
      <option disabled selected class="hid"></option>
			<? error_reporting(-1);
			header('Content-Type: text/html; charset=utf-8');

			  include("db.php");
			  mysql_query("SET NAMES 'utf8';");
			  mysql_query("SET CHARACTER SET 'utf8';");
			  mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
			  $q = mysql_query("select carName from cars where carType='Тягач' ")or die (mysql_error()) ;
			  while($cars = mysql_fetch_array($q)) {
			  	echo "<option value='$cars[carName]'>$cars[carName]</option>";}?>

      </select>

      <select id="микроавтобус" style="display: none"  name="car13">
      <option disabled selected class="hid"></option>
			<? error_reporting(-1);
			header('Content-Type: text/html; charset=utf-8');

			  include("db.php");
			  mysql_query("SET NAMES 'utf8';");
			  mysql_query("SET CHARACTER SET 'utf8';");
			  mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
			  $q = mysql_query("select carName from cars where carType='микроавтобус' ")or die (mysql_error()) ;
			  while($cars = mysql_fetch_array($q)) {
			  	echo "<option value='$cars[carName]'>$cars[carName]</option>";}?>

      </select>

      <select id="Бульдозер" style="display: none" name="car14">
       <<option disabled selected class="hid"></option>
			<? error_reporting(-1);
			header('Content-Type: text/html; charset=utf-8');

			  include("db.php");
			  mysql_query("SET NAMES 'utf8';");
			  mysql_query("SET CHARACTER SET 'utf8';");
			  mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
			  $q = mysql_query("select carName from cars where carType='Бульдозер' ")or die (mysql_error()) ;
			  while($cars = mysql_fetch_array($q)) {
			  	echo "<option value='$cars[carName]'>$cars[carName]</option>";}?>
      </select>

      <select id="Мини-погрузчик" style="display: none" name="car15">
     <option disabled selected class="hid"></option>
			<? error_reporting(-1);
			header('Content-Type: text/html; charset=utf-8');

			  include("db.php");
			  mysql_query("SET NAMES 'utf8';");
			  mysql_query("SET CHARACTER SET 'utf8';");
			  mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
			  $q = mysql_query("select carName from cars where carType='Мини-погрузчик' ")or die (mysql_error()) ;
			  while($cars = mysql_fetch_array($q)) {
			  	echo "<option value='$cars[carName]'>$cars[carName]</option>";}?>
      </select>

      <select id="Фронтальный погрузчик" style="display: none" name="car16">
      <option disabled selected class="hid"></option>
			<? error_reporting(-1);
			header('Content-Type: text/html; charset=utf-8');

			  include("db.php");
			  mysql_query("SET NAMES 'utf8';");
			  mysql_query("SET CHARACTER SET 'utf8';");
			  mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
			  $q = mysql_query("select carName from cars where carType='Фронтальный погрузчик' ")or die (mysql_error()) ;
			  while($cars = mysql_fetch_array($q)) {
			  	echo "<option value='$cars[carName]'>$cars[carName]</option>";}?>
      </select>

      <select id="Эксковатор" style="display: none" name="car17">
       <option disabled selected class="hid"></option>
			<? error_reporting(-1);
			header('Content-Type: text/html; charset=utf-8');

			  include("db.php");
			  mysql_query("SET NAMES 'utf8';");
			  mysql_query("SET CHARACTER SET 'utf8';");
			  mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
			  $q = mysql_query("select carName from cars where carType='Эксковатор' ")or die (mysql_error()) ;
			  while($cars = mysql_fetch_array($q)) {
			  	echo "<option value='$cars[carName]'>$cars[carName]</option>";}?>
      </select>

      <select id="Трактор" style="display: none" name="car18">
      <option disabled selected class="hid"></option>
			<? error_reporting(-1);
			header('Content-Type: text/html; charset=utf-8');

			  include("db.php");
			  mysql_query("SET NAMES 'utf8';");
			  mysql_query("SET CHARACTER SET 'utf8';");
			  mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
			  $q = mysql_query("select carName from cars where carType='Трактор' ")or die (mysql_error()) ;
			  while($cars = mysql_fetch_array($q)) {
			  	echo "<option value='$cars[carName]'>$cars[carName]</option>";}?>
      </select>

      <select id="легковые" style="display: none" name="car19">
      <option disabled selected class="hid"></option>
			<? error_reporting(-1);
			header('Content-Type: text/html; charset=utf-8');

			  include("db.php");
			  mysql_query("SET NAMES 'utf8';");
			  mysql_query("SET CHARACTER SET 'utf8';");
			  mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
			  $q = mysql_query("select carName from cars where carType='легковые' ")or die (mysql_error()) ;
			  while($cars = mysql_fetch_array($q)) {
			  	echo "<option value='$cars[carName]'>$cars[carName]</option>";}?>
      </select>

      <select id="другое" style="display: none" name="car20">
       <option  disabled selected class="hid"></option>
      </select>
  </fieldset>


  <label for="detail" class="form-label">Наименование</label>

	  <center><textarea name="detail" style="position:center; width:96%; height:80px; font-family: Arial; font-size: 14px"></textarea></center>




    <label for="col" class="form-label">Количество</label>
    <input type="col" name="col" class="form-control" style="width:70px;  "  id="col" >
    <label for="detail" class="form-label">шт.(л.)</label><br>

    <label for="cena" class="form-label">Сумма </label>
    <input type="cena" name="sum" class="form-control" style="width:30%" >
    <label for="detail" class="form-label">тг.</label><br>

    <label for="date" class="form-label">Дата</label>
    <input type="date" name="date" class="form-control" id="date" value=<?php echo "$data"?>><br>


    <label for="nomerSch" class="form-label" >Счет</label>
   <input type=text name="nomerSch" style="width:45%" id="nomerSch" value=<?php echo "$nomerScheta"?>><br>

    <label for="firm" class="form-label">Поставщик</label>
    <input type="firm" name="firm" class="form-control" style="width:30%" id="firm" ><br>

  <button   class="new" name="enter" color=red type="submit" >Добавить</button>

<?php

if(isset($_POST["enter"]))
{
    include("db.php");
	mysql_query("SET NAMES 'utf8';");
mysql_query("SET CHARACTER SET 'utf8';");
mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
   @$type= $_POST["type"]  ; //идет сокращение переменных, из поста в новые
   if (!empty ($_POST["car1"])){$car=$_POST["car1"];
   } elseif(!empty ($_POST["car2"])){$car = $_POST["car2"];
   } elseif(!empty ($_POST["car3"])) {$car = $_POST["car3"];
   } elseif(!empty ($_POST["car4"])) {$car = $_POST["car4"];
   } elseif(!empty ($_POST["car5"])) {$car = $_POST["car5"];
   } elseif(!empty ($_POST["car6"])) {$car = $_POST["car6"];
   } elseif(!empty ($_POST["car7"])) {$car = $_POST["car7"];
   } elseif(!empty ($_POST["car8"])) {$car = $_POST["car8"];
   } elseif(!empty ($_POST["car9"])) {$car = $_POST["car9"];
   } elseif(!empty ($_POST["car10"])) {$car = $_POST["car10"];
   } elseif(!empty ($_POST["car11"])) {$car = $_POST["car11"];
   } elseif(!empty ($_POST["car12"])) {$car = $_POST["car12"];
   } elseif(!empty ($_POST["car13"])) {$car = $_POST["car13"];
   } elseif(!empty ($_POST["car14"])) {$car = $_POST["car14"];
   } elseif(!empty ($_POST["car15"])) {$car = $_POST["car15"];
   } elseif(!empty ($_POST["car16"])) {$car = $_POST["car16"];
   } elseif(!empty ($_POST["car17"])) {$car = $_POST["car17"];
   } elseif(!empty ($_POST["car18"])) {$car = $_POST["car18"];
   } elseif(!empty ($_POST["car19"])) {$car = $_POST["car19"]; //это условия на все ТС(их выбор)
   } else{$car = @$_POST["car20"];}


   $detail  = $_POST["detail"]  ; //продолжается сокращение переменных, из поста в новые
   $col    =     $_POST["col"]  ;
   $sum =     $_POST["sum"]      ;
   $date = $_POST["date"]  ;
   $nomerSch =  $_POST["nomerSch"]   ;
   $firm =  $_POST["firm"]   ;
	 //poshli proverki na pustoty
   if (empty ($col)) {echo "<h3 style='color:red'>Неверное количество, попрубуйте снова<h3>";exit;}
   if (empty ($sum)) {echo "<h3 style='color:red'>Неверно указана сумма, попрубуйте снова<h3>";exit;}
   if (empty ($date)) {echo "<h3 style='color:red'>Неверно указана дата, попрубуйте снова<h3>";exit;}
	if (empty ($nomerSch)) {echo "<h3 style='color:red'>Не указан номер счета, попрубуйте снова<h3>";exit;}
	if (empty ($firm)) {echo "<h3 style='color:red'>Неверно указан поставщик, попрубуйте снова<h3>";exit;}

 mysql_query("insert into details(type,car,name,col,sum,date,number,firm)
   values('$type','$car','$detail','$col','$sum','$date','$nomerSch','$firm')")or die (mysql_error()) ;//запись в таблицу details соответствующих значений из формы
     echo "<h2 style='color:#91ff00'>Добавлено</h2>";
    echo "<script>setTimeout('location=\"add.php\"',1000)</script>";
}
?>

</form>



</body>
</html>
