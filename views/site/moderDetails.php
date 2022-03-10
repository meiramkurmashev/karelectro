<?php
use yii\widgets\LinkPager;
use yii\base\Widget;
use yii\BaseYii;
use yii\db\Query;
use yii\widgets\ActiveForm;
use app\models\Cars;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

?>
<?php /* if($_COOKIE["login"]!="dir"){echo "Please, <a href='index.php'>login</a>";exit;} */?>

<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="logo.jpg" type="image/x-icon">
  <meta charset="UTF-8">
	<title>Запрос по деталям</title>
</head>
<body>



<?= Html::beginForm('moderdetails') ?>
		 	<select <?php if(isset($_POST['ok']) || isset($_POST["okk"])){ echo "style='display:none'"; } ?> name="type" onchange="if (self.OBJ) OBJ.style.display = 'none';
		                        if (this.value) OBJ = document.getElementById (this.value),
		                        OBJ.style.display = 'block'; else OBJ = null">
		    <option  disabled selected class="hid">Выберите тип ТС</option>
		           <?php foreach ($types as $type):?>
		          <option value='<?= $type?>'><?= $type?></option>
			      <?php endforeach;?>
		        </select>
<button class="btn-xs btn-primary" type="submit" name="ok" <?php if(isset($_POST['ok']) || isset($_POST["okk"])){ echo "style='display:none'"; } ?>>показать</button>

<?= Html::endForm() ?>
<?= Html::beginForm('moderdetails') ?>
<?php

			if(isset($_POST["ok"])):?>





		       	<? //$items=[1=>'asd',2=>'123']?>

		       	 Выбранный тип ТС: <br><input size=7px name='object1' readonly type='text' value='<?= $typeselected?>'><button  class="btn-xs btn-danger" type='reset' onClick='window.location.href=window.location.href;' name='nazad'>изменить</button><br>

		        <select id="<? $type ?>" name="car1" >
		         <option disabled selected class="hid"></option>
					<?php foreach ($names as $name):?>
		          <option value='<?= $name?>'><?= $name?></option>
			      <?php endforeach;?>
		        </select>

		    <button class = "btn-xs btn-success" type="submit" name="okk" <?php if(isset($_POST['okk'])){ echo "style='display:none'"; } ?>>OK</button>
		    	<?php endif;?>
<?= Html::endForm() ?>
<?php if(isset($_POST['okk'])):?>

	<table border=1 width="100%">
		Выбранное ТС: <br><b><?= $typeselectedToDetails?> <?= $carselected?></b><br><button class="btn-xs btn-warning" type='reset' onClick='window.location.href=window.location.href;' name='nazad'>изменить</button>
  		<tr><th>Наименование</th><th>кол-во</th><th>сумма</th><th>дата</th><th>номер <br>счета</th><th>поставщик</th></tr>

  		 <?php foreach ($details as $detail):?>

  	   					<td width=26%><?= $detail->name?> </td>
  	   					<td width=1,5% align='center'><?= $detail->col?></td>
     						<td width=7,5% align='right'><?= $detail->sum?>  </td>
     						<td width=10% align='center'><?= $detail->getDate()?></td>
     						<td width=10%><?= $detail->number?></td>
     						<td width=28%><?= $detail->firm?></td>


     					</tr><?php $all_sum [] = $detail->sum; endforeach;?>





	<? $bigSum = array_sum($all_sum);?>

	<table border=1 width=100%> <th width=85% align='right'>Общая сумма:</th> <th><?= $bigSum?> тенге</th></tr></table>
<?php endif;?>
</body>
</html>