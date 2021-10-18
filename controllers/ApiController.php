<?php


namespace app\controllers;


use app\models\BasketModel;
use app\models\DetailModel;
use app\models\User;
use Yii;
use yii\rest\Controller;

class ApiController extends Controller
{
    public function actionFilter(){
        $searchModel = new DetailModel();
        $dataProvider = $searchModel->search(Yii::$app->request->get());

        return $this->renderPartial('../site/grid', [
            'dataProvider' => $dataProvider,
            'model' => $searchModel,
        ]);
    }

    public function actionView($id){
        $model = DetailModel::find()->where(['id'=>$id])->one();
        return $this->renderPartial('../site/show',['model'=>$model]);
    }

    public function actionAdd($id){
        $detail = DetailModel::findOne(['id'=>$id]);
        $user = User::findOne($_GET['user']);
        $detail->link('user',$user);
        $user->link('details',$detail);
        $detail->save();
        $user->save();
    }

    public function actionGet(){
        $user_id =$_GET['user'];
        $user = User::findOne(['id'=>$user_id]);
        $details = $user->details;
        return $this->renderPartial('../site/basket',['models'=>$details]);
    }
}