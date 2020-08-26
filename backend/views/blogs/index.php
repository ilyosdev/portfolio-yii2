<?php

    use common\models\Categories;
    use yii\grid\GridView;
    use yii\helpers\ArrayHelper;
    use yii\helpers\Html;

    /* @var $this yii\web\View */
    /* @var $searchModel common\models\search\BlogsSearch */
    /* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title = Yii::t('app', 'News');
    $this->params['breadcrumbs'][] = $this->title;

    $categoryFilter = ArrayHelper::map(Categories::find()->all(), 'id', 'name');
?>
<div class="news-index">


    <div class="header-panel">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a(Yii::t('app', 'Create'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel'  => $searchModel,
        'columns'      => [
            [
                'class'          => 'yii\grid\SerialColumn',
                'headerOptions'  => ['width' => '70'],
                'contentOptions' => ['class' => 'text-center']
            ],
            [
                'attribute'      => 'date',
                'headerOptions'  => ['width' => '120'],
                'contentOptions' => ['class' => 'text-center'],
                'format'         => ['date', 'php:d/m/Y H:i']
            ],
            'title',
            [
                'attribute' => 'category_id',
                'filter'    => $categoryFilter,
                "value"     => "category.name"
            ],
            [
                'attribute'     => 'views',
                'headerOptions' => ['width' => '70']
            ],
            [
                'class'          => 'yii\grid\ActionColumn',
                'template'       => '{update} {delete}',
                'headerOptions'  => ['width' => '70'],
                'contentOptions' => ['class' => 'text-center']
            ],
        ],
    ]); ?>
</div>
