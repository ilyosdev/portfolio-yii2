<?php

    use common\models\Categories;
    use mihaildev\ckeditor\CKEditor;
    use mihaildev\elfinder\ElFinder;
    use mihaildev\elfinder\InputFile;
    use yii\helpers\ArrayHelper;
    use yii\helpers\Html;
    use yii\widgets\ActiveForm;

    /* @var $this yii\web\View */
    /* @var $model common\models\News */
    /* @var $form yii\widgets\ActiveForm */

    $categoryFilter = ArrayHelper::map(Categories::find()->all(), 'id', 'name');
?>
<div class="news-form">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="row">

        <div class="col-md-6">

            <?= $form->field($model, 'img')->widget(InputFile::class, [
                'language'      => 'ru',
                'filter'        => 'image',
                'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
                'options'       => ['class' => 'form-control'],
                'buttonOptions' => ['class' => 'btn btn-success'],
                'multiple'      => false
            ]); ?>
        </div>

        <div class="col-md-6"><?= $form->field($model, 'lang')->dropDownList(['uz' => 'Ўзбек тилида', 'kk' => 'Қорақолпоқ тилида'], ['style' => 'padding: 10px;']); ?></div>

    </div>

    <?=
        $form->field($model, 'content')->widget(CKEditor::class, [
            'editorOptions' => ElFinder::ckeditorOptions('elfinder'),
        ]);
    ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'recommend')->dropDownList(['0' => 'Йўқ', '1' => 'Ха'], ['style' => 'padding: 10px;']); ?>

        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'category_id')->dropDownList($categoryFilter) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'isSlider')->dropDownList(['0' => 'Йўқ', '1' => 'Ха'], ['style' => 'padding: 10px;']); ?>
        </div>
        <!--        <div class="col-md-6">-->
        <!--            --><? //= $form->field($model, 'source')->textInput(['maxlength' => true]) ?>
        <!--        </div>-->
    </div>

    <?
        if (!$model->isNewRecord) {
            ?>
            <?= $form->field($model, 'date')->textInput(['maxlength' => true]) ?>
            <?
        }
    ?>
    <?= $form->field($model, 'user_id')->hiddenInput(['value' => Yii::$app->user->identity->getId()])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
