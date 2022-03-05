<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "oil".
 *
 * @property int $id
 * @property string $object
 * @property string $car
 * @property string $date
 * @property int $oil
 * @property string $comment
 */
class Oil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'oil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['object', 'car', 'date', 'oil', 'comment'], 'required'],
            [['date'], 'safe'],
            [['oil'], 'integer'],
            [['object', 'car'], 'string', 'max' => 50],
            [['comment'], 'string', 'max' => 120],
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
            'car' => 'Car',
            'date' => 'Date',
            'oil' => 'Oil',
            'comment' => 'Comment',
        ];
    }
}
