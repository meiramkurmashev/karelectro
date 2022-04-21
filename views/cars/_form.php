<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Cars;
use app\models\Objects;
/* @var $this yii\web\View */
/* @var $model app\models\Cars */
/* @var $form yii\widgets\ActiveForm */
?>
<?
$objects=Objects::getObjects();
$array1 = array_combine($objects, $objects);
$types = Cars::getTypes();
$array2 = array_combine($types, $types);


?>
<div class="cars-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'carObject')->dropDownList($array1)->label('Название объекта') ?>

    <?= $form->field($model, 'carName')->textInput(['maxlength' => true])->label('Название ТС')  ?>

    <?= $form->field($model, 'carType')->dropDownList($array2)->label('Тип ТС') ?>

    <?= $form->field($model, 'carYear')->textInput()->label('Год выпуска')?>

    <?= $form->field($model, 'carDriver1')->textInput(['maxlength' => true])->label('Водитель 1') ?>

    <?= $form->field($model, 'carDriver2')->textInput(['maxlength' => true])->label('Водитель 2')?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
