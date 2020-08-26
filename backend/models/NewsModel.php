<?php
    namespace backend\models;
    use common\models\News;
    use yii\base\Model;

    class NewsModel extends Model
    {
        private $fbAccesToken = 'EAAFTl8glvV8BAJDRKBxiXwKWh7wNPGGzNEF69ocLZBsxY7ik2H5meSxmMyjCskv0PpJAA8E5jmQQTWwEvIafGHZAEJWOaKox2VRh4nnaVZB4bI337oeNPyUvlaoT4jabhA1220TqUjLr5tphQT7uH8mjZAH5PhQe7x4qPhGZClUGQyyfFrTZC0';
        private $token = '531492990:AAGn4YqkmeirKVFY1fKymT7DZFLMNNteYWE';

        //todo::fbni oziz qoshib bering

        public function start()
        {
            $newsTg = News::find()->where(['telegram' => 0])->orderBy(['id' => SORT_ASC])->asArray()->one();
            $newsFb = News::find()->where(['facebook' => 0])->orderBy(['id' => SORT_ASC])->asArray()->one();
            $this->tgSender($newsTg);
            $this->fbSender($newsFb);
        }
        public function tgSender($data)
        {
            $chat_id = '@amunewsuz';
            $bot_url = "https://api.telegram.org/bot{$this->token}/";
            $data['img'] = "http://amunews.uz" . $data['img'];;
            $new_url = "http://amunews.uz/news/{$data['id']}";
            $caption = "{$data['title']}\n{$new_url} \n\n 📌Амударё туманининг https://t.me/amunewsuz каналига аъзо бўлинг!";
            $caption = urlencode($caption);
            $photo = urlencode($data['img']);
            $url = "{$bot_url}sendPhoto?chat_id={$chat_id}&caption={$caption}&photo={$photo}";

            $result = @file_get_contents($url);
            $resultJ = json_decode($result, true);
            if ((bool)$resultJ['ok']) {
                $this->update($data['id']);
            }
        }

        public function fbSender($data)
        {
        }
        public function update($id)
        {
            $model = News::find()->where(['id' => $id])->one();
            $model->telegram = 1;
            $model->save(false);
        }
    }