<?php include("fon.php");?>
<?php if($_COOKIE["login"]!="madiyar"){echo "Please, <a href='index.php'>login</a>";exit;}?>
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
<title>Изменение участка</title>
</head>

<body>
  <form class="oilForm" action="<?php echo $_SERVER['PHP_SELF']?>" method=post>
		<a href="oil.php">Назад</a><br>
		<a href="addObject.php">Добавить объект</a>
    </form>
</body>
</html>
	<?php error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');
  
  include("db.php");
  mysql_query("SET NAMES 'utf8';");
  mysql_query("SET CHARACTER SET 'utf8';");
  mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
  $q = mysql_query("select * from cars ORDER by carType ASC, carName  ASC ")or die (mysql_error()) ;
   $number = 1;

		echo '<table border=1 width=53%>';
      echo "<tr><th class=hid>id</th><th>№</th><th>Тип ТС</th><th>ТС</th><th>Объект</th></tr>";



        while($r = mysql_fetch_array($q))

          {echo  "<form action='$_SERVER[PHP_SELF]' method=post><tr>
            <td class=hid><input type=hidden  name=id  value='$r[id]'></td>
			<td width=1%>$number</td>
						<td width=6%>$r[carType]</td>
            <td width=50%>$r[carName]</td>
                <td width=30%><input name=carObject value='$r[carObject]'></td>
                
                                   <td width=30px><input type=submit value='OK' name=save></td>
              </tr></form>";
		   $number++;
            }
    echo '</table>';

     if (isset($_POST["save"]))
     {
          //print_r($_POST);
         mysql_query("update cars set carObject='$_POST[carObject]' where id='$_POST[id]'")or die(mysql_error());//id мы сделали невидимым чтобы его использовать для update как неизменная переменная
         echo "<script>setTimeout('location=\"$_SERVER[PHP_SELF]\"',0)</script>";
     }


  ?>
