<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pays".
 *
 * @property int $id
 * @property string|null $photo
 * @property string|null $date
 * @property string|null $name
 * @property string|null $comment
 * @property resource|null $solution
 */
class Pays extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pays';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date'], 'safe'],
            [['photo', 'name', 'comment', 'solution'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'photo' => 'Photo',
            'date' => 'Date',
            'name' => 'Name',
            'comment' => 'Comment',
            'solution' => 'Solution',
        ];
    }

     public static function getAll()
    {
        return Pays::find()->all();
    }
}
