<?php

use yii\grid\GridView;
use yii\helpers\Html;

echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            'count',
            'price',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{new_action1} {new_action2}',
                'buttons' => [
                    'new_action1' => function ($url, $model) use ($user) {
                        return Html::a('<span class="glyphicon glyphicon-eye-open">Просмотр </span>', '/api/view/'.$model->id.'?user='.$user, [
                            'title' => Yii::t('app', 'Просмотр'),
                            'class' => 'view'
                        ]);
                    },
                    'new_action2' => function ($url, $model) use ($user) {
                        return Html::a('<span class="glyphicon"> Добавить в корзину</span>', '/api/add/'.$model->id.'?user='.$user, [
                            'title' => Yii::t('app', 'Добавить'),
                            'class' => 'add'
                        ]);
                    }
                ],
            ],
        ]
    ]
);
