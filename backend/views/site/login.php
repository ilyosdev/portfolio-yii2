<?php

    /* @var $this yii\web\View */
    /* @var $form yii\bootstrap\ActiveForm */

    /* @var $model LoginForm */

    use common\models\LoginForm;
    use yii\bootstrap\ActiveForm;
    use yii\helpers\Html;

    $this->title = Yii::t('app', 'Authorization');
?>
<div class="site-login">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Authorization'), ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>