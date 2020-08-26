<?php


    namespace frontend\controllers;


    use common\models\Weather;
    use Yii;
    use yii\web\Controller;

    class AjaxController extends Controller
    {

        public function actionWeather()
        {
            $cookies = Yii::$app->request->cookies;
            $region_id = intval(Yii::$app->request->post('region_id'));

            $weather = Weather::getByRegion($region_id);

            if ($weather == null) {
                return "";
            }

            $cookie = [
                'name'   => "weather",
                'value'  => $region_id,
                'expire' => 604800,
                'path'   => '/'
            ];

            //$cookies->add(new Cookie($cookie));

            return $this->renderAjax('@frontend/views/components/weather', ['weather' => $weather]);


        }

    }