<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\Url;

?>
<div><a href="/api/get?user=<?=$user?>" id="basket" class="btn btn-primary">Корзина</a><div>
<div class="offset-lg-1 col-lg-11">
    <?= Html::a('Выйти',Url::to('/site/logout') ,['class' => 'btn btn-primary', 'name' => 'logout-button']) ?>
</div>
<div class="site-login">
    <?
    $form = ActiveForm::begin([
        'id' => 'search-form',
        'action' => '/api/filter',
        'method' => 'get',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label'],
        ],
    ]);

    echo $form->field($model, 'name')->textInput(['autofocus' => true]);
    ?>
    <div class="form-group">
        <div class="offset-lg-1 col-lg-11">
            <?= Html::submitButton('Search', ['class' => 'btn btn-primary', 'name' => 'search-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
    <div id="myGrid">
        <?php
            echo $this->render('grid',['dataProvider'=>$dataProvider,'user'=>$user]);
        ?>
    </div>
</div>
