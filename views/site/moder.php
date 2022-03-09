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
	<?= Html::a('Автопарк', ['cars'], ['style' => 'color:black; font-size:24px; text-decoration:none']) ?>
	<h3>Посмотреть:</h3>
		<ul>
			<li><?= Html::a('Работы', ['moderworks'], ['style' => 'color:black; font-size:24px; text-decoration:none']) ?></li><br>
			<li><?= Html::a('Детали', ['moderdetails'], ['style' => 'color:black; font-size:24px; text-decoration:none']) ?></li><br>
			<li><?= Html::a('ГСМ', ['moderoil'], ['style' => 'color:black; font-size:24px; text-decoration:none']) ?></li><br>
			<li><?= Html::a('Платежи на одобрение', ['moderpays'], ['style' => 'color:black; font-size:24px; text-decoration:none']) ?></li>

		</ul><br>
</body>
</html>
