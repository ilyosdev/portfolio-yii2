<?php

    namespace frontend\controllers;

    use common\models\News;
    use Yii;
    use yii\web\Controller;
    use yii\web\Response;

    class SiteController extends Controller
    {

        /**
         * {@inheritdoc}
         */
        public function actions()
        {
            return [
                'error'   => [
                    'class' => 'yii\web\ErrorAction',
                ],
                'captcha' => [
                    'class'           => 'yii\captcha\CaptchaAction',
                    'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
                ],
            ];
        }

        /**
         * Displays homepage.
         *
         * @return mixed
         */
        public function actionIndex()
        {
            return $this->render('index');
        }

        public function actionAbout()
        {
            if(Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
                return [
                    'isOk' => true,
                    'data' => $this->renderPartial('about')
                ];
            }
            return $this->render('about');
        }

        public function actionWorks()
        {
            if(Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
                return [
                    'isOk' => true,
                    'data' => $this->renderPartial('works')
                ];
            }
            return $this->render('works');
        }

        public function actionBlog()
        {
            if(Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
                return [
                    'isOk' => true,
                    'data' => $this->renderPartial('blog')
                ];
            }
            return $this->render('blog');
        }


        public function actionTest()
        {
            return $this->renderContent(date("Y-m-d H:i:s"));
        }

    }
