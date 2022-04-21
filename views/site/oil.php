<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
?>
<?php

 /*
if($_COOKIE["login"]!="dir"){echo "Please, <a href='index.php'>login</a>";exit;} */
?>
<?php
error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');
?>

 <?= Html::a('Автопарк', ['cars/index'], ['class' => 'btn-sm btn-info']) ?><br><br>

<?= Html::beginForm('') ?>
		<select <?php if(isset($_POST['ok'])){ echo "style='display:none'"; } ?> name="object" class="form-control">
				<option disabled selected class="hid">Выберите объект</option>
				<?php foreach ($objects as $object):?>
		          <option value='<?= $object?>'><?= $object?></option>
			      <?php endforeach;?>

		</select><br>
		<button class="btn btn-success " type="submit" <?php if(isset($_POST['ok'])){ echo "style='display:none'"; } ?> name="ok">показать</button>

<?= Html::endForm() ?>


				<?php $form = ActiveForm::begin();?>

				<? if(isset($_POST['ok'])):?>


<?php

//$a = $objectCar;
//$b = array_flip($objectCar); // $b will be a different array
//$c = &$b;
//$result=array_merge($a,$c); // $c will be a reference to $a
//var_dump($result);die;

//$array_one = ['key1', 'key2', 'key3'];
//$array_two = ['value1', 'value2', 'value3'];

$array = array_combine($objectCar, $objectCar);//замена значение для option в select
//var_dump($array_three);die;

/*
    array (
      'key1' => 'value1',
      'key2' => 'value2',
      'key3' => 'value3',
    )
*/
?>

					<?php echo $form->field($model, 'object')->textInput(['readonly' => true, 'value' => $objectselected])->label('Выбранный объект')?>
					<input  class="btn btn-warning " type="button" value="Изменить" onClick="window.location.href=window.location.href">


					<?php echo $form->field($model, 'car')->dropDownList($array,[ 'prompt' => 'Выберете ТС'])->label('ТС'); ?>

					<?php echo $form->field($model, 'date')->input('date')->label('Дата'); ?>
					<?php echo $form->field($model, 'oil')->label('Количество'); ?>
					<?php echo $form->field($model, 'comment')->label('Комментарий'); ?>
					<input  class="btn btn-primary "  type=submit name=enter value="Внести"><? endif;?>
				<?php ActiveForm::end() ?>
