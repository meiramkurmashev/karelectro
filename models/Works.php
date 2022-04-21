<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "works".
 *
 * @property int $id
 * @property string|null $object
 * @property string|null $work
 * @property string|null $date
 */
class Works extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'works';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'work', 'date', 'object'], 'required'],
            [['date'], 'safe'],
            [['object'], 'string', 'max' => 50],
            [['work'], 'string', 'max' => 500],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'object' => 'Object',
            'work' => 'Work',
            'date' => 'Date',
        ];
    }

     public static function getWorks($objectselected)
    {

          return Works::find()->where(["object" => $objectselected])->orderBy('date DESC')->all();
    }

    public function getDate()
    {

        return Yii::$app->formatter->asDate($this->date);
    }
}
