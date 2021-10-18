<h1>Корзина</h1>
<?php

use yii\helpers\Html;

foreach ($models as $model) {
    echo \yii\widgets\DetailView::widget([
        'model'=>$model
    ]);
}
echo Html::a('Назад','/site/index');
?>
