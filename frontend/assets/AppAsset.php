<?php

    namespace frontend\assets;

    use yii\web\AssetBundle;

    /**
     * Main frontend application asset bundle.
     */
    class AppAsset extends AssetBundle
    {
        public $basePath = '@webroot';
        public $baseUrl = '@web/static';

        public $css = [
            "cssjs/site.css",
            "cssjs/style.css",
            "cssjs/line-icon.css",
            'cssjs/animate.css',
            'http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css',
        ];

        public $js = [
            "cssjs/jquery.js",
            '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',
            "cssjs/main.js",
            "cssjs/custom.js",
        ];

        public $depends = [
            'yii\web\YiiAsset',
            'yii\bootstrap4\BootstrapAsset',
        ];

    }
