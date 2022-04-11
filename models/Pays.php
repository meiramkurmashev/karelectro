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
            [['name','photo','date'], 'required'],

            [['photo'], 'file'],

            [['date'], 'safe'],
            [['name', 'comment', 'solution'], 'string', 'max' => 200],
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

      public static function getPays()
    {

          return Pays::find()->where(['solution' => 'N'])->orderBy('date DESC')->all();
    }

     public function allow()
    {
        $this->solution = 'Y';
        return $this->save(false);

    }

     public function uploadFile($file)
    {
      $extension = pathinfo($file, PATHINFO_EXTENSION);
      $filen = strtolower(md5(uniqid($this->photo->baseName)) . '.' . $extension);
      $file->saveAs(Yii::getAlias('@web') . 'temp/' . $filen);
      return $filen;//возвращаем навзвание файла[как раз то, что и не делалось ранее]
    }
    public function saveImage($filename)
    {
      $this->photo = $filename;
      return $this->save(true);
    }


}
