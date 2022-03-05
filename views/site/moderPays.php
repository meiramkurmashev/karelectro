<?php include("fon.php");?>

<?php if($_COOKIE["login"]!="dir"){echo "Please, <a href='index.php'>login</a>";exit;} ?>
<?
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');
?><html lang="en">
<head>
	<link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
	<link rel="stylesheet" href="style.css">
     <link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
     <link href="style.css" rel="stylesheet">
     <meta charset="UTF-8">
	<title>Платежи на одобрение</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
  <a href="javascript:history.back();">Назад</a><br>
	<a href="paysInfo.php">Информация о платежных поручениях</a><br>
	<h2>Платежи на одобрение:</h2>

<?php
include("db.php");
mysql_query("SET NAMES 'utf8';");
     mysql_query("SET CHARACTER SET 'utf8';");
     mysql_query("SET SESSION collation_connection = 'utf8_general_ci';");
     $q = mysql_query("select * from pays where solution='Не одобрено' order by id DESC ")or die (mysql_error()) ;
     echo '<table width=63%>';
  $number = 1;
      echo "<tr><th class=hid>id</th><th>№</th><th>Название</th><th>Просмотр</th><th>Дата</th><th>Комментарий</th></tr>";


    while($r = mysql_fetch_array($q))

          {echo  "<form action='$_SERVER[PHP_SELF]' method=post><tr>
            <td class=hid><input type=hidden  name=id  value='$r[id]'></td>
               <td class=hid><input type=hidden  name=photo  value='$r[photo]'></td>
      <td width=1%>$number</td>
            <td width=15%>$r[name]</td>
			 <td width=6%><a href='temp/$r[photo]'  class='atuin-btn'>Открыть</a></td>
            <td width=12%>$r[date]</td>
			<td width=25%>$r[comment]</td>
			
           

                                   <td width=1% ><input type=submit class='btn1' value='Одобрить'  name=save></td>
              </tr></form>";
       $number++;
            }
    echo '</table>';
   
     if (isset($_POST["save"]))
     {
          //print_r($_POST);
         mysql_query("update pays set solution='Одобрено' where id='$_POST[id]'")or die(mysql_error());//id мы сделали невидимым чтобы его использовать для update как неизменная переменная
         echo "<script>setTimeout('location=\"$_SERVER[PHP_SELF]\"',0)</script>";
     }


  ?>