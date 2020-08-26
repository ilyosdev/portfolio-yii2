<?php


    namespace frontend\controllers;


    use common\models\Categories;
    use common\models\News;
    use common\models\search\BlogsSearch;
    use Yii;
    use yii\data\Pagination;
    use yii\web\Controller;

    class NewsController extends Controller
    {

        public function actionIndex()
        {
            $lang = Yii::$app->language;
            $query = News::find()->where(['lang' => $lang])->orderBy(['date' => SORT_DESC]);
            $count = $query->count();
            $pagination = new Pagination(['totalCount' => $count]);
            $news = $query->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
            return $this->render('index', ['news' => $news, 'pagination' => $pagination]);
        }


        public function actionCategory($url)
        {
            $category = Categories::findOne(['url' => $url]);

            if ($category == null) {
                return $this->goHome();
            }
            $lang = Yii::$app->language;

            $query = News::find()->where(['category_id' => $category->id, 'lang' => $lang])->orderBy(['date' => SORT_DESC]);
            $count = $query->count();
            $pagination = new Pagination(['totalCount' => $count]);
            $news = $query->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
            return $this->render('index', ['news' => $news, 'pagination' => $pagination, 'category' => $category]);
        }


        public function actionTags($tag)
        {
            $query = News::getNewsByTag($tag);
            $count = $query->count();
            $pagination = new Pagination(['totalCount' => $count]);
            $news = $query->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
            return $this->render('index', ['tag' => $tag, 'news' => $news, 'pagination' => $pagination]);
        }

        public function actionSearch($q)
        {
            $query = News::getBySearch($q);
            $count = $query->count();
            $pagination = new Pagination(['totalCount' => $count]);
            $news = $query->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();
            return $this->render('index', ['search' => $q,'news' => $news, 'pagination' => $pagination]);
        }

        public function actionRss()
        {

            $feed = Yii::$app->feed->writer();
            $lang = Yii::$app->language;
            $feed->setTitle('News');
            $feed->setLink('http://example.com');
            $feed->setFeedLink('http://example.com/rss', 'rss');
            $feed->setDescription(Yii::t('app', 'Recent headlines'));
            $feed->setGenerator('http://example.com/rss');
            $feed->setDateModified(time());
            /**
             * Add one or more entries. Note that entries must
             * be manually added once created.
             */
            $posts = News::find()->orderBy('id DESC')->limit(20)->all();
            foreach ($posts as $post) {
                $entry = $feed->createEntry();
                $entry->setTitle($post->title);
                $entry->setLink($post->alias);
                $entry->setContent($post->content);
                $entry->setDateCreated(strtotime($post->date));
                $feed->addEntry($entry);
            }
            /**
             * Render the resulting feed to Atom 1.0 and assign to $out.
             * You can substitute "atom" with "rss" to generate an RSS 2.0 feed.
             */
            $out = $feed->export('rss');
            header('Content-type: text/xml');
            echo $out;
            die();
        }

        public function actionView($id)
        {
            $model = News::getById($id);


            if ($model == null) {
                return $this->goHome();
            }
            $model->updateCounters(['views' => 1]);

            return $this->render('view', ['model' => $model]);
        }

    }