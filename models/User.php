<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $email
 * @property string|null $password
 * @property int|null $isAdmin
 * @property string|null $photo
 */
class User extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['isAdmin'], 'integer'],
            [['isDir'], 'integer'],
            [['isNac'], 'integer'],
            [['isBuh'], 'integer'],
            [['isMeh'], 'integer'],
            [['isDis'], 'integer'],
            [['username', 'email', 'password', 'photo'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */



       public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'isAdmin' => 'Is Admin',
            'isDir' => 'Is Dir',
            'isDis' => 'Is Dis',
            'isMeh' => 'Is Meh',
            'isBuh' => 'Is Buh',
            'isNac' => 'Is Nah',
            'photo' => 'Photo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */

    public function getComments()
    {
        return $this->hasMany(Comment::className(), ['user_id' => 'id']);
    }

    public static function findIdentity($id)
    {
        return User::findOne($id);
    }
    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public static function findByUsername($username)
    {
        return User::find()->where(['username'=>$username])->one();
    }

    public  function validatePassword($password)
    {
        return ($this->password == $password) ? true : false;
    }

    public function create()
    {
        return $this->save(false);
    }

    public function saveFromVk($uid, $first_name, $photo)
    {
        $user = User::findOne($uid);//проверяем есть ли такой пользователь по id

        if($user)
        {
            return Yii::$app->user->login($user);
        }
        $this->id= $uid;
        $this->username = $first_name;
        $this->photo = $photo;
        $this->create();
        return Yii::$app->user->login($this);
    }

       public function getImage()
    {
            return $this->photo;
    }

}
