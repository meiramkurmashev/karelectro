<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cars */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cars-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'carObject')->textInput(['maxlength' => true])->label('Название объекта') ?>

    <?= $form->field($model, 'carName')->textInput(['maxlength' => true])->label('Название ТС')  ?>

    <?= $form->field($model, 'carType')->textInput(['maxlength' => true])->label('Тип ТС') ?>

    <?= $form->field($model, 'carYear')->textInput()->label('Год выпуска')?>

    <?= $form->field($model, 'carDriver1')->textInput(['maxlength' => true])->label('Водитель 1') ?>

    <?= $form->field($model, 'carDriver2')->textInput(['maxlength' => true])->label('Водитель 2')?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
