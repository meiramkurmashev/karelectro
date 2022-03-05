

<?php /* if($_COOKIE["login"]!="madiyar" and $_COOKIE["login"]!="dir"){echo "Please, <a href='index.php'>login</a>";exit;} */?>
<?
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');
?><html lang="en">
<head>
     <link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
     <link href="style.css" rel="stylesheet">
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Автопарк</title>
</head>
<body>
	<a href="javascript:history.back();">Назад</a><br>


<?php

mysql_query("SET NAMES 'utf8';");
     mysql_query("SET CHARACTER SET 'utf8';");
     mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
     $q = mysql_query("select * from cars order by carType ASC, carName  ASC ")or die (mysql_error()) ;
     echo '<table border=1 width=53%>';
	$number = 1;
  		echo "<tr><th class=hid>id</th><th>№</th><th>Тип ТС</th><th>ТС</th><th>год</th><th>водитель 1</th><th>водитель 2</th><th>Объект</th></tr>";



     		while($r = mysql_fetch_array($q))

     			{echo  "<form action='$_SERVER[PHP_SELF]' method=post><tr>
						<td class=hid><input type=hidden  name=id  value='$r[id]'></td>
						<td width=1%>$number</td>
						<td width=6%>$r[carType]</td>
  	   					<td width=40%> $r[carName]</td>
  	   					<td width=6%>$r[carYear]</td>
  	   					<td >$r[carDriver1]</td>
     						<td >$r[carDriver2] </td>
                              <td width=10%>$r[carObject]</td>

     					</tr></form>";
				 $number++;
            }
		echo '</table>';?>

</body>
</html>