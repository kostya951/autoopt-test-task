<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Url;
use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\grid\GridView;

?>
<div class="site-login">
    <?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'username',
            'password',
            ]
        ]
    );

    $form = ActiveForm::begin([
        'id' => 'add-user-form',
        'action' => '/site/add',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 col-form-label'],
        ],
    ]);

     echo $form->field($model, 'username')->textInput(['autofocus' => true]);
     echo $form->field($model, 'password')->textInput();
    ?>
    <div class="form-group">
        <div class="offset-lg-1 col-lg-11">
            <?= Html::submitButton('Добавить', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
        <div class="offset-lg-1 col-lg-11">
            <?= Html::a('Выйти',Url::to('/site/logout') ,['class' => 'btn btn-primary', 'name' => 'logout-button']) ?>
         </div>
    </div>

    <?php ActiveForm::end(); ?>
</div>
