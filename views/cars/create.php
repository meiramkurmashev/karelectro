<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cars */

$this->title = 'Добавить ТС';
$this->params['breadcrumbs'][] = ['label' => 'Автопарк', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cars-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
