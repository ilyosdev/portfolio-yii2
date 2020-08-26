<?php
    $params = array_merge(
        require __DIR__ . '/../../common/config/params.php',
        require __DIR__ . '/../../common/config/params-local.php',
        require __DIR__ . '/params.php',
        require __DIR__ . '/params-local.php'
    );

    return [
        'id'                  => 'app-frontend',
        'language'            => 'en',
        'basePath'            => dirname(__DIR__),
        'bootstrap'           => ['log'],
        'controllerNamespace' => 'frontend\controllers',
        'components'          => [
            'request'            => [
                'baseUrl'   => '',
                'csrfParam' => '_csrf-frontend',
            ],
            'user'               => [
                'identityClass'   => 'common\models\User',
                'enableAutoLogin' => true,
                'identityCookie'  => ['name' => '_identity-frontend', 'httpOnly' => true],
            ],
            'session'            => [
                'name' => 'advanced-frontend',
            ],
            'log'                => [
                'traceLevel' => YII_DEBUG ? 3 : 0,
                'targets'    => [
                    [
                        'class'  => 'yii\log\FileTarget',
                        'levels' => ['error', 'warning'],
                    ],
                ],
            ],
            'errorHandler'       => [
                'errorAction' => 'site/error',
            ],
            'assetsAutoCompress' => [
                'class'           => 'skeeks\yii2\assetsAuto\AssetsAutoCompressComponent',
                'enabled'         => false,
                'readFileTimeout' => 5,           //Time in seconds for reading each asset file

                'jsCompress'                => true,        //Enable minification js in html code
                'jsCompressFlaggedComments' => true,        //Cut comments during processing js

                'cssCompress' => true,        //Enable minification css in html code

                'cssFileCompile'        => true,        //Turning association css files
                'cssFileRemouteCompile' => false,       //Trying to get css files to which the specified path as the remote file, skchat him to her.
                'cssFileCompress'       => true,        //Enable compression and processing before being stored in the css file
                'cssFileBottom'         => false,       //Moving down the page css files
                'cssFileBottomLoadOnJs' => false,       //Transfer css file down the page and uploading them using js

                'jsFileCompile'                 => true,        //Turning association js files
                'jsFileRemouteCompile'          => false,       //Trying to get a js files to which the specified path as the remote file, skchat him to her.
                'jsFileCompress'                => true,        //Enable compression and processing js before saving a file
                'jsFileCompressFlaggedComments' => true,        //Cut comments during processing js

                'noIncludeJsFilesOnPjax' => true,        //Do not connect the js files when all pjax requests

                'htmlFormatter' => [
                    'class'         => 'skeeks\yii2\assetsAuto\formatters\html\TylerHtmlCompressor',
                    'extra'         => true,       //use more compact algorithm
                    'noComments'    => true,        //cut all the html comments
                    'maxNumberRows' => 50000,       //The maximum number of rows that the formatter runs on
                ]
            ],
            'urlManager'         => [
                'class'                        => 'codemix\localeurls\UrlManager',
                'showScriptName'               => false,
                'enableLanguageDetection'      => true,
                'enablePrettyUrl'              => true,
                'enableDefaultLanguageUrlCode' => false,
                'languages'                    => ['uz', 'en', 'ru'],
                'rules'                        => array(
                    ''                                    => '/site/index',
                    'about'                              => '/site/about',
                    'blog'                              => '/site/blog',
                    'works'                              => '/site/works',
                    //                    ''                                  => '/site/index',
                    'home'                                => '/site/index',
                    'pages/<url:[A-Za-z0-9-_.]+>'         => '/pages/index',
                    'survey/<id:[0-9]+>'                  => '/survey/index',
                    'news/category/<url:[A-Za-z0-9-_.]+>' => '/news/category',
                    'search?<url:[A-Za-z0-9-_.]+>'        => '/news/search',
                    'news/tags/<tag:[^\n]+>'              => '/news/tags',

                    'api/<controller:\w+>'                                       => 'api/<controller>',
                    'api/<controller:\w+>/<id:\d+>'                              => 'api/<controller>/view',
                    'api/<controller:\w+>/<id:\d+>/<title>'                      => 'api/<controller>/view',
                    'api/<controller:\w+>/<action:\w+>'                          => 'api/<controller>/<action>',
                    'api/<controller:\w+>/<action:\w+>/<id>'                     => 'api/<controller>/<action>',
                    'api/<controller:\w+>/<action:\w+>/<parent_id:\d+>/<id:\d+>' => 'api/<controller>/<action>',
                    'api/<controller:\w+>/<action:\w+>/<id:\d+>/<title>'         => 'api/<controller>/<action>',
                    'api/<controller:\w+>/<action:\w+>/<guid:\w+>'               => 'api/<controller>/<action>',


                    '<controller:\w+>'                                       => '<controller>',
                    '<controller:\w+>/<id:\d+>'                              => '<controller>/view',
                    '<controller:\w+>/<id:\d+>/<title>'                      => '<controller>/view',
                    '<controller:\w+>/<action:\w+>'                          => '<controller>/<action>',
                    '<controller:\w+>/<action:\w+>/<id>'                     => '<controller>/<action>',
                    '<controller:\w+>/<action:\w+>/<parent_id:\d+>/<id:\d+>' => '<controller>/<action>',
                    '<controller:\w+>/<action:\w+>/<id:\d+>/<title>'         => '<controller>/<action>',
                    '<controller:\w+>/<action:\w+>/<guid:\w+>'               => '<controller>/<action>',
                ),
            ],
            'i18n'               => [
                'translations' => [
                    '*'   => [
                        'class'          => 'yii\i18n\PhpMessageSource',
                        'basePath'       => '@frontend/messages',
                        'sourceLanguage' => "en-GB",
                        'fileMap'        => [
                            'main' => 'app.php',
                            'yii'  => 'yii.php',
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
        ],
        'params'              => $params,
    ];
