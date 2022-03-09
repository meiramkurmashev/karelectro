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




		 	<select name="type" onchange="if (self.OBJ) OBJ.style.display = 'none';
		                        if (this.value) OBJ = document.getElementById (this.value),
		                        OBJ.style.display = 'block'; else OBJ = null">
		    <option  disabled selected class="hid">Выберите тип ТС</option>
		           <?php foreach ($types as $type):?>
		          <option value=АГП><?= $type?></option>
			      <?php endforeach;?>
		        </select>





		       	<? //$items=[1=>'asd',2=>'123']?>



		        <select id="АГП" style="display: none" name="car1" >
		         <option disabled selected class="hid"></option>
					<?php foreach ($names as $name):?>
		          <option value=<?= $name?>><?= $name?></option>
			      <?php endforeach;?>
		        </select>


</body>
</html>