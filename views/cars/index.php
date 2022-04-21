<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CarsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Автопарк';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cars-index">

    <h1><?= Html::encode('Автопарк') ?></h1>

    <p>
        <?= Html::a('Добавить ТС', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'carObject',
            'carName',
            'carType',
            'carYear',
            //'carDriver1',
            //'carDriver2',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
