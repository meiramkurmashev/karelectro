<?php

namespace app\controllers;

use Yii;
use app\models\Cars;
use app\models\Details;
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
        return $this->render('moder');
    }

    public function actionModerworks()
    {
        return $this->render('moderWorks');
    }




    public function actionModerdetails()
    {
        $types = Cars::getTypes();

        $typeselected = $_POST['type'];
        $names = Cars::getNames($typeselected);


       // var_dump($carsNames);die;
        return $this->render('moderDetails',[

            'types' => $types,
            'typeselected' => $typeselected,
            'names' => $names,



    ]);
    }



    public function actionModeroil()
    {
        return $this->render('moderoil');
    }

    public function actionModerpays()
    {
        return $this->render('moderPays');
    }



     public function actionAdd()
    {
        return $this->render('add');
    }

     public function actionOil()
    {
        return $this->render('oil');
    }

     public function actionPays()
    {
        return $this->render('pays');
    }

     public function actionWorks()
    {
        return $this->render('works');
    }

     public function actionCars()
    {
        $cars = Cars::getAll();
        return $this->render('cars' ,[

         'cars' => $cars


    ]);
    }


}
