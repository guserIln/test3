<?php

namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Model;
use app\models\Resume;
use app\models\Spec;
use yii\widgets\ActiveForm;
use app\models\AddResumeForm;
use app\models\EditResumeForm;
use yii\helpers\Time;
use app\models\UploadImage;
use yii\web\UploadedFile;
use  yii\data\Pagination;

class SiteController extends Controller
{
   
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

   
    public function actionIndex()
    {
       $request = Yii::$app->request;
       $city = $request->get('city');  
       $salary = $request->get('salary');
       $spec = Spec::find()->all();
        $str = $request->get('order');
            if ($str == 'asc'){
               $find = Resume::find()->orderBy(['salary' => SORT_ASC])->all();
                return $this->render('index', ['model' => $find, 'spec'=>$spec,]);
            } else 
           if ($str == 'desc'){
               $find = Resume::find()->orderBy(['salary' => SORT_DESC])->all();
                return $this->render('index', ['model' => $find, 'spec'=>$spec,]);
            } else
             if ($str == 'date'){
               $find = Resume::find()->orderBy(['date' => SORT_DESC])->all();
                return $this->render('index', ['model' => $find, 'spec'=>$spec,]);
            } 
          $find = Resume::find();
          $countQuery = clone $find;
          $pagination = new Pagination(['totalCount' => $countQuery->count()]);
          $pagination->pageSizeParam = false;
          $pagination->forcePageParam = false;
           $resumes = $find->offset($pagination->offset)->limit($pagination->limit)->all();
           return $this->render('index', ['model' => $resumes,'spec'=>$spec,'pagination'=>$pagination,]);
    }
 
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

   
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }


    public function actionOpen()
    {          
        $spec = Spec::find()->all();
        $request = Yii::$app->request;
        $id = $request->get('id'); 
        $find = Resume::find()->where(['userid' => 2, 'id'=> $id])->all();
       foreach ($find as $key => $value) {
            $sh = $value["shows"];
            $sh++;
       }
       $params = ['shows'=>$sh, 'id' =>  $id];

     Yii::$app
      ->db
      ->createCommand('UPDATE resume SET shows=:shows WHERE id=:id', $params)
      ->execute();
         

        return $this->render('open', [
            'model' => $find,'spec'=>$spec,]);
    }

    public function actionAbout()
    {
         $find = Resume::find()->where(['userid' => 2])->all();
         $spec = Spec::find()->all();
        return $this->render('about', ['model' => $find, 'spec'=>$spec,]);
    }
}
