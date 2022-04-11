<?php

namespace app\controllers;
use Yii;
use app\models\Pays;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

class PaysController extends \yii\web\Controller
{



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
