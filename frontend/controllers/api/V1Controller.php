<?php

    namespace frontend\controllers\api;

    use common\models\Advertising;
    use common\models\CategoriesApp;
    use common\models\News;
    use common\models\Pages;
    use Yii;
    use yii\rest\Controller;

    class V1Controller extends Controller
    {

        public function actionNews()
        {
            $request = Yii::$app->request;

            $offset = intval($request->get('offset'));
            $limit = intval($request->get('limit'));
            $category_id = intval($request->get('category_id'));
            $media = intval($request->get('media'));
            $order = $request->get('order');
            $date = $request->get('date');
            $recommend = intval($request->get('recommend'));

            if (!$offset > 0) {
                $offset = 0;
            }

            if (!$limit > 0 && $limit == 0) {
                $limit = 15;
            }

            if (!$category_id > 0) {
                $category_id = 0;
            }

            if (empty($order)) {
                $order = 'desc';
            }

            if ($order != 'desc' && $order != 'asc') {
                $order = 'desc';
            }

            if ($recommend > 0) {
                $recommend = 1;
            } else {
                $recommend = 0;
            }

            if (!$media > 0) {
                $media = 0;
            }

            $offset = $offset * $limit;

            $list = News::getApiV1List($offset, $limit, $date, $order, $category_id, $recommend, $media);

            $result = [];


            foreach ($list as $item) {

                if (!strpos($item['img'], "http://")) {
                    $item['img'] = "http://amunews.uz" . $item['img'];
                }

                $result[] = [
                    'id'         => $item['id'],
                    'title'      => $item['title'],
                    'date'       => date("d.m.Y, H:i", strtotime($item['date'])),
                    'img'        => $item['img'],
                    'category'   => $item['category'],
                    'categoryID' => $item['categoryID'],
                    'views'      => $item['views'],
                    'media'      => $item['media'],
                    'lang'       => $item['lang'],
                    'content'    => $item['content'],
                ];
            }

            $error = false;

            $advertising = $this->advertising(10);

            return [
                'error'       => $error,
                'list'        => $result,
                'advertising' => $advertising,
            ];
        }

        public function actionGet_news()
        {
            $news_id = intval(Yii::$app->request->get('id'));
            $query = News::getById($news_id);
            $error = true;
            $news = [];
            if ($query != null) {
                $query->updateCounters(['views' => 1]);
                $news['categoryID'] = $query->category_id;
                $news['category'] = $query->category->name;
                $news = $query;

                $error = false;
            }

            return [
                'error'   => $error,
                'message' => "",
                'body'    => [
                    'news' => $news,
                ],
            ];
        }

        public function actionCategories()
        {
            $lang = Yii::$app->language;
            return [
                'error'   => false,
                'message' => '',
                'list'    => CategoriesApp::find()->select("id, uz, kk, color, {$lang} AS name")->orderBy(['position' => SORT_ASC])->asArray()->all(),
            ];
        }

        public function actionRelated()
        {
            $request = Yii::$app->request;
            $news_id = intval($request->get('id'));
            $title = $request->get('title');

            $message = "";
            $related = [];
            $advertising = $this->advertising(11);

            $r = News::getRelated($news_id, $title);
            if (count($r) > 0) {
                foreach ($r as $item) {

                    if (strpos($item['img'], "http") === false) {
                        $item['img'] = "http://amunews.uz" . $item['img'];
                    }

                    $related[] = [
                        'id'         => $item['id'],
                        'title'      => $item['title'],
                        'date'       => date("d.m.Y, H:i", strtotime($item['date'])),
                        'img'        => $item['img'],
                        'category'   => $item->category->name,
                        'categoryID' => $item->category_id,
                        'views'      => $item['views'],
                        'media'      => $item['media'],
                        'lang'       => $item['lang'],
                        'content'    => $item['content'],
                    ];
                }
            } else {
                $related = [];
            }

            $error = false;

            return [
                'error'       => $error,
                'message'     => $message,
                'list'        => $related,
                'advertising' => $advertising,
            ];

        }

        public function actionPages()
        {
            $request = Yii::$app->request;
            $url = $request->get("url");

            $error = true;
            $message = "";
            $pages = "";

            $model = Pages::findByUrl($url);

            if ($model == null) {
                $message = "Саҳифа топилмади";
            } else {
                $error = false;
                $model->updateCounters(['views' => 1]);

                $pages = $model->content;
            }


            return [
                "error"   => $error,
                "message" => $message,
                "body"    => $pages
            ];
        }

        public function actionNotification()
        {
            return [
                "error"   => true,
                "message" => "",
                "body"    => ""
            ];
        }

        private function advertising($type_id)
        {
            $model = Advertising::find()->where(['type_id' => $type_id])->asArray()->one();
            if ($model == null) {
                return "";
            }

            return '<a href="' . $model['url'] . '"><img src="' . $model['img'] . '" alt=""></a>';
        }

    }