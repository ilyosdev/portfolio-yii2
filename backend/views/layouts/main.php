<?php

    /* @var $this View */

    /* @var $content string */

    use backend\assets\AppAsset;
    use common\widgets\Alert;
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\web\View;
    use yii\widgets\Breadcrumbs;

    AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<?php
    if (!Yii::$app->user->isGuest) {
        ?>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <?
                            if (Yii::$app->user->identity->status == 'admin') {
                                ?>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= Yii::t('app', 'News') ?> <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= Url::to(['/news']) ?>"><?= Yii::t('app', 'News') ?></a></li>
                                        <li><a href="<?= Url::to(['/categories']) ?>"><?= Yii::t('app', 'Categories') ?></a></li>
                                        <li><a href="<?= Url::to(['/tags']) ?>"><?= Yii::t('app', 'Tags') ?></a></li>
                                        <!--                                <li><a href="--><? //= Url::to(['/comments']) ?><!--">--><? //= Yii::t('app', 'Comments') ?><!--</a></li>-->
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= Yii::t('app', 'Pages') ?> <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= Url::to(['/pages']) ?>"><?= Yii::t('app', 'Pages') ?></a></li>
                                        <li><a href="<?= Url::to(['/users']) ?>"><?= Yii::t('app', 'User') ?></a></li>
                                        <li><a href="<?= Url::to(['/advertising']) ?>"><?= Yii::t('app', 'Advertising') ?></a></li>
                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?= Yii::t('app', 'Settings') ?> <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?= Url::to(['/menu']) ?>"><?= Yii::t('app', 'Menus') ?></a></li>
                                        <li><a href="<?= Url::to(['/translations']) ?>"><?= Yii::t('app', 'Translations') ?></a></li>
                                    </ul>
                                </li>
                                <?
                            } else { ?>
                                <li><a href="<?= Url::to(['/news']) ?>"><?= Yii::t('app', 'News') ?></a></li>
                                <?
                            } ?>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="<?= Url::to(['/profile']) ?>"><?= Yii::t('app', 'Profil') ?></a></li>
                        <li><a href="/" target="_blank">Сайтга ўтиш</a></li>
                        <li><a data-method="post" href="<?= Url::to(['/site/logout']) ?>"><?= Yii::t('app', 'Чиқиш') ?></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <?
    }
?>

<div class="container">
    <div class="wrap">
        <div class="clearfix"></div>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<?php
    if (!Yii::$app->user->isGuest) {
        ?>
        <footer class="footer">
            <div class="container">
                &copy; <?= Html::encode(Yii::$app->name) ?>
            </div>
        </footer>
        <?php
    }
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
