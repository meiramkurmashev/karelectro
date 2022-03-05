<?php include("fon.php");?>

<?php  if($_COOKIE["login"]!="buh" and $_COOKIE["login"]!="dir"){echo "Please, <a href='index.php'>login</a>";exit;} ?>
<?
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');
?><html lang="en">
<head>
     <link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
     <link href="style.css" rel="stylesheet">
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Платежные поручения</title>
</head>
<body>
	<a href="javascript:history.back();">Назад</a><br>


<?php
include("db.php");
mysql_query("SET NAMES 'utf8';");
     mysql_query("SET CHARACTER SET 'utf8';");
     mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
     $q = mysql_query("select * from pays order by id DESC ")or die (mysql_error()) ;
     echo '<table border=1 width=53%>';
	$number = 1;
  		echo "<tr><th class=hid>id</th><th>№</th><th>Название</th><th>Файл</th><th>дата</th><th>комментарий</th><th>решение</th></tr>";



     		while($r = mysql_fetch_array($q))

     			{echo  "<form action='$_SERVER[PHP_SELF]' method=post><tr>
						<td class=hid><input type=hidden  name=id  value='$r[id]'></td>
						<td width=1%>$number</td>
						<td width=15%>$r[name]</td>
  	   					<td width=9%><a href='temp/$r[photo]'  class='atuin-btn'>Открыть</a></td>
  	   					<td width=8%>$r[date]</td>
  	   					<td >$r[comment]</td>";
     					if($r[solution]=='Одобрено'){ echo "<td style='font-weight:bold; color:#00FF00'>$r[solution]</td>";}else{ echo "<td style='color:red'>$r[solution]</td>";}
						echo "</tr></form>";
				 $number++;
            }
		echo '</table>';?>

</body>
</html>