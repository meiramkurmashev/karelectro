<?php

namespace app\controllers;
use Yii;
use app\models\Pays;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use app\models\LoginForm;

use app\models\Cars;
use app\models\Details;
use app\models\Oil;
use app\models\User;
use app\models\Works;
use app\models\Objects;

use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

use app\models\ContactForm;

class PaysController extends \yii\web\Controller
{


      public function actionLogin()
    {

        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionIndex()
    {
        if( Yii::$app->user->identity->isDir || Yii::$app->user->identity->isBuh) {
            $payslist = Pays::find()->orderBy([ 'date' => SORT_DESC])->all();
            return $this->render('index', [
                'payslist'=>$payslist,
            ]);
        } else {return $this->render('pleaseAuth');}

    }

    public function actionCreate()
    {
        if( Yii::$app->user->identity->isBuh) {
                        $model = new Pays();
                        if ($model->load(Yii::$app->request->post())){

                            //происходит загрузка и


                            $file= UploadedFile::getInstance($model, 'photo');



                            $model->saveImage($model->uploadFile($file));//не понял как получилось, но получилось :D
                           // $model->save();//сохранение[с валидацией] данных
                            Yii::$app->session->setFlash('success','Платежка добавлена');
                            return $this->redirect(['pays/index']);
                            //и флеш сообщение пользователю
                        }



                        return $this->render('create',[
                            'model'=>$model,
                        ]);}
            else
            {return $this->render('pleaseAuth');}

    }


    public function actionUpdate()
    {
        $payslistupdate = Pays::find()->where(["solution" => 'N'])->orderBy([ 'date' => SORT_DESC])->all();
        return $this->render('update', [
            'payslistupdate'=>$payslistupdate,
        ]);
    }



    public function actionAllow($id)
    {
        $pay = Pays::findOne($id);
        if($pay->allow())
        {
            return $this->redirect(['update']);
        }
    }

}
