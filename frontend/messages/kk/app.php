<?php    use common\models\Translations;    use yii\helpers\ArrayHelper;    $lang = Yii::$app->cache->get('lang_kk');    if (!$lang) {        $lang = Translations::find()->all();        Yii::$app->cache->set('lang_kk', $lang, 3600);    }    return ArrayHelper::map($lang, 'code', 'kk');