<?php

    $params = array_merge(
        require __DIR__ . '/../../common/config/params.php',
        require __DIR__ . '/../../common/config/params-local.php',
        require __DIR__ . '/params.php',
        require __DIR__ . '/params-local.php'
    );

    return [
        'language'            => 'uz',
        'id'                  => 'app-backend',
        'name'                => 'IlyosDev',
        'basePath'            => dirname(__DIR__),
        'controllerNamespace' => 'backend\controllers',
        'bootstrap'           => ['log'],
        'modules'             => [
            'gridview' => ['class' => '\kartik\grid\Module'],
        ],
        'components'          => [
            'request'       => [
                'baseUrl'   => '/admin',
                'csrfParam' => '_csrf-backend',
            ],
            'user'          => [
                'identityClass'   => 'common\models\User',
                'enableAutoLogin' => true,
                'identityCookie'  => ['name' => '_identity-backend', 'httpOnly' => true],
            ],
            'session'       => [
                'name' => 'advanced-backend',
            ],
            'log'           => [
                'traceLevel' => YII_DEBUG ? 3 : 0,
                'targets'    => [
                    [
                        'class'  => 'yii\log\FileTarget',
                        'levels' => ['error', 'warning'],
                    ],
                ],
            ],
            'errorHandler'  => [
                'errorAction' => 'site/error',
            ],
            'urlManager'    => [
                'class'               => '\yii\web\UrlManager',
                'showScriptName'      => false,
                'enablePrettyUrl'     => true,
                'enableStrictParsing' => true,
                'rules'               => [
                    ''                                       => '/news/index',
                    '<controller>'                           => '<controller>',
                    '<controller>/<action>'                  => '<controller>/<action>',
                    '<controller>/<action>/<id:\d+>'         => '<controller>/<action>',
                    '<controller>/<action>/<id:\d+>/<title>' => '<controller>/<action>',
                    '<controller>/<id:\d+>/<title>'          => '<controller>/index',
                    '<controller>/<action>/<params:\S+>'     => '<controller>/<action>',
                ],
            ],
            'cacheFrontend' => [
                'class'     => 'yii\caching\FileCache',
                'cachePath' => Yii::getAlias('@frontend') . '/runtime/cache'
            ],
            'i18n'          => [
                'translations' => [
                    '*'   => [
                        'class'    => 'yii\i18n\PhpMessageSource',
                        'basePath' => '@backend/messages',
                        'fileMap'  => [
                            'app' => 'app.php',
                        ],
                    ],
                    'yii' => [
                        'class'          => 'yii\i18n\PhpMessageSource',
                        'basePath'       => "@backend/messages",
                        'sourceLanguage' => 'en',
                        'fileMap'        => [
                            'yii' => 'yii.php',
                        ],
                    ]
                ],
            ],
            'formatter'     => [
                'class'       => 'yii\i18n\Formatter',
                'nullDisplay' => '-',
            ],
        ],
        'controllerMap'       => [
            'elfinder' => [
                'class'  => 'mihaildev\elfinder\Controller',
                'access' => ['@'],
                'roots'  => [
                    [
                        'baseUrl'  => '',
                        'basePath' => Yii::getAlias('@frontend') . "/web/",
                        'path'     => 'uploads',
                        'name'     => 'files',
                    ],
                    [
                        'baseUrl'  => '',
                        'basePath' => Yii::getAlias('@frontend') . "/web/",
                        'path'     => 'images',
                        'name'     => 'Images',
                    ],
                ],
            ]
        ],
        'params'              => $params,
    ];