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
            "cssjs/style.css",
        ];

        public $js = [
            "cssjs/jquery.js",
            "cssjs/main.js",
            "cssjs/custom.js",
        ];

        public $depends = [
//            'yii\web\YiiAsset',
        ];

    }
