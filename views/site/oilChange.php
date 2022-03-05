<?php include("fon.php");?>
<html lang="en">
<head>
     <link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
     <link href="style.css" rel="stylesheet">
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Изменение ГСМ</title>
</head>
<body>
	<a href='oil.php'>Назад</a>
<?php if($_COOKIE["login"]!="madiyar"){echo "Please, <a href='index.php'>login</a>";exit;}?>
<?php 
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');


include("db.php");
mysql_query("SET NAMES 'utf8';");
     mysql_query("SET CHARACTER SET 'utf8';");
     mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
     $q = mysql_query("select * from oil order by date desc")or die (mysql_error()) ;
     echo '<table border=1 width=53%>';

  		echo "<tr><th class=hid>id</th><th>Объект</th><th>ТС</th><th>Дата</th><th>кол-во</th><th>комментарий</th></tr>";



     		while($r = mysql_fetch_array($q))

     			{echo  "<form action='$_SERVER[PHP_SELF]' method=post><tr>
						<td class=hid><input type=hidden  name=id  value='$r[id]'></td>
						<td width=10%>$r[object]</td>
  	   					<td width=30%> $r[car]</td>
  	   					<td width=13%>$r[date]</td>
  	   					<td width=2% align='center'><input style='width:40px' name=oil value='$r[oil]'></td>
     						<td >$r[comment] </td>
                                   <td width=30px><input type=submit value='OK' name=save></td>
     					</tr></form>";
            }
		echo '</table>';

     if (isset($_POST["save"]))
     {
          //print_r($_POST);
         mysql_query("update oil set oil='$_POST[oil]' where id='$_POST[id]'")or die(mysql_error());//id мы сделали невидимым чтобы его использовать для update как неизменная переменная
         echo "<script>setTimeout('location=\"oilChange.php\"',0)</script>";
     }


?>
	</body>
</html>