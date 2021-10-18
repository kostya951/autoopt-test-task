<?php


namespace app\controllers;


use app\models\DetailModel;
use app\models\LoginForm;
use app\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\Url;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actionIndex(){
        if(Yii::$app->user->isGuest){
            $model = new LoginForm();
            return $this->render('login',['model'=>$model]);
        }else if(Yii::$app->user->can('createUser')){
            $dataProvider = new ActiveDataProvider([
                'query' => User::find()
            ]);
            $model = new User();
            return $this->render('admin',['model'=> $model,'dataProvider'=>$dataProvider]);
        }else{
            $model = new DetailModel();
            $user_id = Yii::$app->user->id;
            $dataProvider = new ActiveDataProvider([
                'query' => DetailModel::find()
            ]);
            return $this->render('plain',['model'=>$model, 'dataProvider'=>$dataProvider,'user'=>$user_id]);
        }
    }

    public function actionLogin(){
        $model = new LoginForm();
        $model->load(Yii::$app->request->post());
        $user = User::findByUsername($model->username);
        if($user && $user->validatePassword($model->password)){
            Yii::$app->user->login($user);
        }
        $this->redirect(Url::to('/site/index'));
    }

    public function actionLogout(){
        Yii::$app->user->logout();
        $this->redirect(Url::to('/site/index'));
    }

    public function actionAdd(){
        $user = new User();
        $user->load(Yii::$app->request->post());
        $user->save();
        $this->redirect(Url::to('/site/index'));
    }
}