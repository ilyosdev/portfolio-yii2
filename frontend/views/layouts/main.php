<?php

    /* @var $this View */
    /* @var $content string */
    use frontend\assets\AppAsset;
    use yii\helpers\Html;
    use yii\helpers\Url;
    use yii\web\View;

    AppAsset::register($this);
    $lang = Yii::$app->language;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= $lang ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui" />
    <title>IlyosDev</title>
    <meta name="keywords"
          content="web developer, developer, ilyos olimov, programmer, web, development, html, css, javascript, html">
    <meta name="description" content="">
    <meta name="google" content="notranslate" />
<!--    <link rel="apple-touch-icon" sizes="180x180" href="url/img/fav/apple-touch-icon.png">-->
<!--    <link rel="icon" type="image/png" href="url/img/fav/favicon-32x32.png" sizes="32x32">-->
<!--    <link rel="icon" type="image/png" href="url/img/fav/favicon-16x16.png" sizes="16x16">-->
<!--    <link rel="manifest" href="url/img/fav/manifest.json">-->
<!--    <link rel="shortcut icon" href="url/img/fav/favicon.ico">-->
    <meta name="theme-color" content="#ffffff">
    <meta itemprop="name" content="Ilyos Olimov">
    <meta itemprop="description" content="I am a full-stack web developer. I mean it, bro!">
    <meta itemprop="image" content="">
    <meta property="og:title" content="" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="url/" />
    <meta property="og:image" content="" />
    <meta property="og:description" content="" />
    <meta property="og:site_name" content="Ilyos Olimov" />
    <meta property="article:section" content="Blog" />
    <link href="https://fonts.googleapis.com/css2?family=Parisienne&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">

    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- Add the slick-theme.css if you want default styling -->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="off single">
<?php $this->beginBody() ?>
<div id="preload"></div>

<div id="nav" class="off loading">
    <div id="ham">
        <div class="bar">
            <div class="load"></div>
        </div>
    </div>
    <a href="/" id="logo"></a>
</div>

<nav>
    <div></div>
    <ul>
        <li>
            <a class="me" href="/">
                <span>HOME</span>
            </a>
        </li>
        <li>
            <a class="me aroute" href="<?=Url::base()?>/about">
                <span>ABOUT</span></a>

        </li>
        <li>
            <a class="me aroute" href="<?=Url::base()?>/blog">
                <span>BLOG</span></a>
        </li>
        <li>
            <a class="me aroute" href="<?=Url::base()?>/works">
                <span>WORK</span></a>
        </li>
    </ul>
</nav>

<div id="app">
    <?=$content?>
</div>


<?php $this->endBody() ?>

<!--<script type="text/javascript" src=""></script>-->
</body>
</html>
<?php $this->endPage() ?>
