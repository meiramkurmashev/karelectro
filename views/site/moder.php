<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/*if($_COOKIE["login"]!="dir"){echo "Please,<a href='index.php'>login</a>";exit;}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
	<link rel="stylesheet" href="style.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Просмотр</title>
</head>
<body>
	<a href='cars.php' style="color:black; font-size:24px; text-decoration:none">Автопарк ТОО "Карэлектроспецстрой"</a>
	 <?= Html::a('Create Article', ['cars'], ['class' => 'btn btn-success']) ?>
	<h3>Посмотреть:</h3>
		<ul>
			<li><a href='moderWorks.php' style="color:black; font-size:24px; text-decoration:none">Работы</a></li><br>
			<li><a href='moderDetails.php' style="color:black; font-size:24px; text-decoration:none">Детали</a></li><br>
			<li><a href='moderOil.php' style="color:black; font-size:24px; text-decoration:none">расход ГСМ</a></li><br>
			<li><a href='moderPays.php' style="color:black; font-size:24px; text-decoration:none">Платежи на одобрение</a></li>

		</ul><br>
</body>
</html>
