<?php
use yii\helpers\Html;
?>
<?php /*
if($_COOKIE["login"]!="dir"){echo "Please, <a href='index.php'>login</a>";exit;}*/
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
	<meta charset="UTF-8">

	<title>Работы</title>


</head>
<body>


<?= Html::beginForm('moderworks') ?>




			<select <?php if(isset($_POST['enter'])){ echo "style='display:none'"; } ?> name="object" >
				<option  disabled selected class="hid">Выберите объект</option>
				<?php foreach ($objects as $object):?>
					<option  value="<?= $object?>"><?= $object?></option>
				<?php endforeach;?>
		</select>






		    <!--- <input type="checkbox" name="galka" >Показать за весь период<br><br>
		    <label>Начало</label>
		    <input type="date" name="dateS">
		    <label>Конец</label>
		    <input type="date" name="datePo"><br>---><br>
		    <input  <?php if(isset($_POST['enter'])){ echo "style='display:none'"; } ?> class="btn btn-success" type=submit name=enter value=Показать><br>

		    <?= Html::endForm() ?>


<?php
if(isset($_POST["enter"])):?>
	 Выбранный объект: <br><input size=7px readonly type='text' value='<?= $objectselected?>'><button  class="btn-xs btn-danger" type='reset' onClick='window.location.href=window.location.href;' name='nazad'>изменить</button><br>
    <table border="1">

  		<tr ><th>Объект</th><th>Выполенные работы:</th><th>Дата</th></tr>

			<?php foreach ($works as $work):?>
								<tr><td><?= $work->object?></td>
			  	   					<td><?= $work->work ?></td>
			  	   					<td ><?= $work->getDate()?></td>

		     					</tr>
							<?php endforeach;?>


            <!--/*$bigSum= array_sum($all_sum);// вывод суммы литров*/--->

<?php endif;?>
</table >
</body>
</html>





