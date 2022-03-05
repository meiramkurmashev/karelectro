<?php 
include("fon.php");?> 
<?php
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');
?>
<?php if($_COOKIE["login"]!="dir"){echo "Please, <a href='index.php'>login</a>";exit;}?>

<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
  <link href="style.css" rel="stylesheet">
  <meta charset="UTF-8">
	<title>Запрос по деталям</title>
</head>
<body>
<form   action="<?php echo $_SERVER['PHP_SELF']?>" method=post>
	<a href="moder.php">Назад</a><br>
  <div>
      <fieldset style="width: 435px;"><legend><label for="type" class="form-label">Тип ТС</label></legend>
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

    <fieldset style="width: 435px;"><legend><label>ТС</label></legend>

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
       <option value="все">все</option>
      </select>
  </fieldset>
  <fieldset style="width: 435px;">
    <legend>
    <i style="font-size:18px">Укажите дату</i></legend><br>
     <input type="checkbox" name="galka" style="height: 15px; width: 15px ">Показать за весь период<br><br>
    <label>Начало</label> 
    <input type="date" name="dateS">
    <label>Конец</label>
    <input type="date" name="datePo"><br>
   


   </fieldset>
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
   
   $type= @$_POST["type"]  ; 
   
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
   } elseif(!empty ($_POST["car19"])) {$car = $_POST["car19"];}

  $dateS = @$_POST["dateS"];
  $datePo = @$_POST["datePo"];
  if (@$_POST["car20"] == "все"){
    if(!empty($_POST['galka'])) {$q = mysql_query("select * from details where type='(другое)' order by date")or die (mysql_error()) ;//na nalichie
  } else { 
    if (empty ($dateS)) {echo "<b style='font-size:20px;color:red;'>! Укажите дату</b>";exit;}
    if (empty ($datePo)) {echo "<b style='font-size:20px;color:red;'>! Укажите дату</b>";exit;}
    $q = mysql_query("select * from details where type='(другое)' and date>='$dateS' and date<='$datePo' order by date")or die (mysql_error()) ;}
  }else{
  if (empty ($car)) {echo "<b style='font-size:20px;color:red;'>! Выберете ТС</b>";exit;}
  if(!empty($_POST['galka'])) {$q = mysql_query("select * from details where car='$car' order by date")or die (mysql_error()) ;//na nalichie
  } else { 
    if (empty ($dateS)) {echo "<b style='font-size:20px;color:red;'>! Укажите дату</b>";exit;}
    if (empty ($datePo)) {echo "<b style='font-size:20px;color:red;'>! Укажите дату</b>";exit;}
    $q = mysql_query("select * from details where car='$car' and date>='$dateS' and date<='$datePo' order by date")or die (mysql_error()) ;}
  }
   // if ($type='Выберете тип ТС') {echo "<b style='font-size:24px;color:red;'>!</b>Выберете тип ТС";exit;}
   
    
   /*$detail  = $_POST["detail"]  ; //продолжается сокращение переменных, из поста в новые
   $col    =     $_POST["col"]  ;
   $sum =     $_POST["sum"]      ;

   $nomerSch =  $_POST["nomerSch"]   ;
   $firm =  $_ POST["firm"]   ;*/
	   //теперь пошла информация об авто
    $info = mysql_query("select * from cars where carName='$car'")or die (mysql_error()) ;
    echo '<br><table border=1 width=25%>'; 
    echo '<tr><th align=left style="font-size:18px">Информация о ТС:</th></tr>'; 
    while($read = mysql_fetch_array($info)) {
          echo  "<tr><td><b>Год выпуска:</b> $read[carYear] год</td></tr>
                <tr><td><b>Водитель:</b> $read[carDriver1]</td></tr>
                <tr><td><b>Водитель:</b> $read[carDriver2]</td></tr>";}
            echo  ' </table><br>';
  

  	echo '<table border=1 width=100%>';  
	
  		echo '<tr><th>Тип ТС</th><th>ТС</th><th>Наименование</th><th>кол-во</th><th>сумма</th><th>дата</th><th>номер <br>счета</th><th>поставщик</th></tr>'; 
	
	
     		while($r = mysql_fetch_array($q))  
     			
     			{echo  "<tr><td width=8%>$r[type]</td>
  	   					<td width=15% align='center'> $r[car] </td>
  	   					<td width=30%>$r[name] </td>
  	   					<td width=2% align='center'>$r[col] </td>
     						<td width=10% align='right'>$r[sum] тг. </td>
     						<td align='center'>$r[date] </td>
     						<td>$r[number] </td>
     						<td>$r[firm] </td>
							
							
     					</tr>";$all_sum [] = $r[sum];}
	
					 	
				
  		
	$bigSum= array_sum($all_sum);// вывод суммы 
    
	echo "<table border=1 width=100%> <th width=85% align='right'>Общая сумма:</th> <th>$bigSum тенге</th></tr></table>";	
	
	
				
	
    
	
}
  
?>