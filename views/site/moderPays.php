<?php
use yii\helpers\Html;
?>
<?php /* if($_COOKIE["login"]!="dir"){echo "Please, <a href='index.php'>login</a>";exit;} */ ?>
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

	<a href="paysInfo.php">Информация о платежных поручениях</a><br>
	<h2>Платежи на одобрение:</h2>




    <table border="1" width=63%>
    <? $number = 1; ?>
      <tr><th style="display: none;">id</th><th>№</th><th>Название</th><th>Просмотр</th><th>Дата</th><th>Комментарий</th></tr>




          <?= Html::beginForm('moderpays') ?>
          <?php foreach ($pays as $pay):?>

            <td style="display: none;"><input type=hidden  name=id  value='<?= $pay->id?>'></td>
               <td style="display: none;"><input type=hidden  name=photo  value='<?= $pay->photo?>'></td>
      <td width=1%><?= $number?></td>
            <td width=15%><?= $pay->name?></td>
			 <td width=6%><a href='temp/<?= $pay->photo?>'  class='atuin-btn'>Открыть</a></td>
            <td width=12%><?= $pay->date?></td>
			<td width=25%><?= $pay->comment?></td>



                                   <td width=1% ><input type=submit class='btn1' value='Одобрить'  name=save></td>
              </tr>
              <? $number++;?>
              <?php endforeach;?>
              <?= Html::endForm() ?>


    </table>

    <? if (isset($_POST["save"]))
     {
        $select  = $_POST['id'];
                var_dump($select);die;
          //print_r($_POST);
         //mysql_query("update pays set solution='Одобрено' where id='$_POST[id]'")or die(mysql_error());//id мы сделали невидимым чтобы его использовать для update как неизменная переменная
        // echo "<script>setTimeout('location=\"$_SERVER[PHP_SELF]\"',0)</script>";
     }


  ?>