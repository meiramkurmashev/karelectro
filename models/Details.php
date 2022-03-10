<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "details".
 *
 * @property int $id
 * @property string $type
 * @property string $car
 * @property string $name
 * @property int $col
 * @property int $sum
 * @property string $date
 * @property string $number
 * @property string $firm
 */
class Details extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'details';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'car', 'name', 'col', 'sum', 'date', 'number', 'firm'], 'required'],
            [['col', 'sum'], 'integer'],
            [['date'], 'safe'],
            [['type'], 'string', 'max' => 30],
            [['car'], 'string', 'max' => 50],
            [['name'], 'string', 'max' => 150],
            [['number', 'firm'], 'string', 'max' => 35],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Type',
            'car' => 'Car',
            'name' => 'Name',
            'col' => 'Col',
            'sum' => 'Sum',
            'date' => 'Date',
            'number' => 'Number',
            'firm' => 'Firm',
        ];
    }

    public static function getDetails($carselected)
    {

        return Details::find()->where(["car" => $carselected])->orderBy('date')->all();
    }

      public function getDate()
    {
        return Yii::$app->formatter->asDate($this->date);
    }

}
