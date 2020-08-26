<?php


    namespace frontend\controllers;


    use common\models\Pages;
    use yii\web\Controller;

    class PagesController extends Controller
    {

        public function actionIndex($url)
        {
            $model = Pages::findByUrl($url);

            if ($model == null) {
                return $this->goHome();
            }

            return $this->render('index', ['model' => $model]);
        }

    }