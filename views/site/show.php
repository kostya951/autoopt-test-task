<?php

use yii\helpers\Html;

echo \yii\widgets\DetailView::widget([
    'model'=>$model,
]);
echo Html::a('Назад','/site/index');
?>

