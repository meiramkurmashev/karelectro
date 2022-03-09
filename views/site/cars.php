

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
	<a href="javascript:history.back();">Назад</a>



<table border="1">

        <?php   $number = 1;?>
        <?php  foreach($cars as $car):?>



						<td class=hid><input type=hidden  name=id  value='$car[id]'></td>
						<td width=1%><?= $number?></td>
						<td width=6%><?= $car->carType;?></td>
  	   					<td width=40%><?= $car->carName;?></td>
  	   					<td width=6%><?= $car->carYear;?></td>
  	   					<td ><?= $car->carDriver1;?></td>
     						<td ><?= $car->carDriver2;?></td>
                              <td width=10%><?= $car->carObject;?></td>

     					</tr></form>
				 <? $number++?>

          <?php endforeach;
?>
		</table>

</body>
</html>