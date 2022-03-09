<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "cars".
 *
 * @property int $id
 * @property string $carObject
 * @property string $carName
 * @property string $carType
 * @property int|null $carYear
 * @property string $carDriver1
 * @property string $carDriver2
 */
class Cars extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cars';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['carObject', 'carName', 'carType'], 'required'],
            [['carYear'], 'integer'],
            [['carObject', 'carName', 'carType', 'carDriver1', 'carDriver2'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'carObject' => 'Car Object',
            'carName' => 'Car Name',
            'carType' => 'Car Type',
            'carYear' => 'Car Year',
            'carDriver1' => 'Car Driver 1',
            'carDriver2' => 'Car Driver 2',
        ];
    }

    public static function getAll()
    {
        return Cars::find()->all();
    }

    public static function getTypes()
    {
        return Cars::find()->select('carType')->distinct()->asArray()->column();
    }

    public static function getNames($typeselected)
    {

        return Cars::find()->select('carName')->where(["carType"=>$typeselected])->asArray()->column();
    }
}
