<?php


namespace app\models;


use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;

class DetailModel extends ActiveRecord
{
    public static function tableName(){
        return 'detail';
    }

    public function rules()
    {
        return [
            [['name','id','price','count'], 'safe']
        ];
    }

    public function search($params){
        $query = DetailModel::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!$this->load($params)) {
            return $dataProvider;
        }

        $query->where(['name' => $this->name]);

        return $dataProvider;
    }

    public function getUser(){
        return $this->hasMany(User::class,['id'=>'user_id'])
            ->viaTable('basket',['user_id'=>'id']);
    }
}