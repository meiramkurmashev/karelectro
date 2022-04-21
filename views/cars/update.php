<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cars */

$this->title = 'Редактирование ТС: ' . $model->carType .' '. $model->carName;
$this->params['breadcrumbs'][] = ['label' => 'Cars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cars-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
