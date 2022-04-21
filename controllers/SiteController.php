<?php

namespace app\controllers;

use Yii;
use app\models\Details;
use app\models\Oil;
use app\models\User;
use app\models\Works;
use app\models\Objects;
use app\models\Cars;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
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



    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

     public function actionModer()
    {
        if( Yii::$app->user->identity->isDir) { return $this->render('moder');} else {return $this->render('pleaseAuth');}

    }

    public function actionModerworks()
    {
      if( Yii::$app->user->identity->isDir) {
          $objects = Objects::getObjects();
          $objectselected = $_POST['object'];
          $works = Works::getWorks($objectselected);
          return $this->render('moderWorks',[
            'objects'=>$objects,
            'objectselected'=>$objectselected,
            'works'=>$works
            ]);}
      else {return $this->render('pleaseAuth');}

    }




    public function actionModerdetails()
    {
      if( Yii::$app->user->identity->isDir) {
          $types = Cars::getTypes();
          $typeselected = $_POST['type'];
          $names = Cars::getNames($typeselected);
          $carselected = $_POST['car1'];
          $typeselectedToDetails = $_POST['object1'];

          $details = Details::getDetails($carselected);
          //$details = Details::getDetails($carselected);



         // var_dump($carsNames);die;
          return $this->render('moderDetails',[

              'types' => $types,
              'typeselected' => $typeselected,
              'names' => $names,
              'details'=>$details,
              'carselected'=>$carselected,
              'typeselectedToDetails'=>$typeselectedToDetails
            ]);}
        else {return $this->render('pleaseAuth');}

    }




    public function actionModeroil()
    {
        if( Yii::$app->user->identity->isDir) {
              $objects = Objects::getObjects();
              $objectselected = $_POST['object'];
              $oils = Oil::getOil($objectselected);
              return $this->render('moderOil',[

                 'objects'=>$objects,
                'objectselected'=>$objectselected,
                'oils'=>$oils
                ]);}
        else {return $this->render('pleaseAuth');}

    }



     public function actionAdd()
    {
      if( Yii::$app->user->identity->isMeh) {
        return $this->render('add');
      } else {return $this->render('pleaseAuth');}

    }

     public function actionOil()
    {
        if( Yii::$app->user->identity->isDis) {


                        $model = new Oil();
                        $objects = Objects::getObjects();
                        $objectselected = $_POST['object'];

                        $objectCar = Cars::getCar($objectselected);

                       // if (Yii::$app->request->post()){
                           // var_dump($objectCar);die;
                           // var_dump($objectCar);die;

                         //  $model->load(Yii::$app->request->post());

                          // $model->save();
                          // Yii::$app->session->setFlash('success','Платежка добавлена');
                          //  return $this->redirect(['site/oil']);}



                         $model->load(Yii::$app->request->post());
                          if($model->save()){
                               //  var_dump($_POST['car']);die;
                            Yii::$app->session->setFlash('success','Запись добавлена');
                            return $this->redirect(['site/oil']);}
                        return $this->render('oil',[
                            'model'=>$model,
                            'objects'=>$objects,
                            'objectselected'=>$objectselected,
                            'objectCar'=>$objectCar
                        ]);}
            else
            {return $this->render('pleaseAuth');}
    }



     public function actionWorks()
    {
      if( Yii::$app->user->identity->isNac) {
        $model = new Works();
        $objects = Objects::getObjects();

        if($model->load(Yii::$app->request->post()) && $model->save()){
               //  var_dump($_POST['car']);die;
            Yii::$app->session->setFlash('success','Запись добавлена');
            return $this->redirect(['site/works']);}
        return $this->render('works',[
          'model'=>$model,
          'objects'=>$objects,
        ]);
      } else {return $this->render('pleaseAuth');}

    }

     public function actionCars()
    {
      if( Yii::$app->user->identity->isDir || Yii::$app->user->identity->isDis) {
           $cars = Cars::getAll();
            return $this->render('cars' ,[

             'cars' => $cars
              ]);}
      else {return $this->render('pleaseAuth');}

    }

}
