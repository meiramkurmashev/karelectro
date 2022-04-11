<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "objects".
 *
 * @property string|null $object
 */
class Objects extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'objects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['object'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'object' => 'Object',
        ];
    }

       public static function getObjects()
    {

        return Objects::find()->asArray()->column();
    }
}
