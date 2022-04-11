<?php
use yii\helpers\Html;
?>
<?php /*
if($_COOKIE["login"]!="dir"){echo "Please, <a href='index.php'>login</a>";exit;} */
?>
<?php
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
	<link rel="stylesheet" href="style.css">
	<meta charset="UTF-8">

	<title>Расход ГСМ</title>


</head>
<body>


<?= Html::beginForm('moderoil') ?>





			<select <?php if(isset($_POST['ok'])){ echo "style='display:none'"; } ?> name="object" >
				<option disabled selected class="hid">Выберите объект</option>
				<option value="все участки">показать по всем объектам</option>
				<?php foreach ($objects as $object):?>
		          <option value='<?= $object?>'><?= $object?></option>
			      <?php endforeach;?>

		</select><br>
		<button type="submit" <?php if(isset($_POST['ok'])){ echo "style='display:none'"; } ?> name="ok">показать</button>
		<?= Html::endForm() ?>
		<?php
			if(isset($_POST["ok"])):?>
				 Выбранный объект: <br><input size=7px readonly type='text' value='<?= $objectselected?>'><button  class="btn-xs btn-danger" type='reset' onClick='window.location.href=window.location.href;' name='nazad'>изменить</button><br><br>
			    <table width=100% border="1">

			  		<tr><th>Объект</th><th>ТС</th><th>Дата</th><th>кол-во</th><th>комментарий</th></tr>

						<?php foreach ($oils as $oil):?>
											<tr><td><?= $oil->object?></td>
												<td><?= $oil->car?></td>

												<td ><?= $oil->getDate()?></td>
												<td><?= $oil->oil?></td>
						  	   					<td><?= $oil->comment ?></td>


					     					</tr>

										<?php $all_sum[] = $oil->oil; endforeach;?>
										<? $bigSum = array_sum($all_sum);?>

	<table width=100%><tr> <th >Общая сумма: <?= $bigSum?> л.</th></tr></table>



			<?php endif;?>
			</table >
</body>
</html>