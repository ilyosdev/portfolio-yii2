<?php

    namespace common\models\search;

    use common\models\News;
    use yii\base\Model;
    use yii\data\ActiveDataProvider;

    /**
     * NewsSearch represents the model behind the search form of `common\models\News`.
     */
    class BlogsSearch extends News
    {
        /**
         * {@inheritdoc}
         */
        public function rules()
        {
            // date фильтр керак бўлса dateRange ишлатишинг керак
            return [
                [['id', 'user_id', 'recommend', 'category_id', 'isSlider'], 'integer'],
                [['title', 'content', 'date', 'category_id', 'img', 'lang'], 'safe'],
            ];
        }

        /**
         * {@inheritdoc}
         */
        public function scenarios()
        {
            // bypass scenarios() implementation in the parent class
            return Model::scenarios();
        }

        /**
         * Creates data provider instance with search query applied
         *
         * @param array $params
         *
         * @return ActiveDataProvider
         */
        public function search($params, $lang = "", $category_id = 0)
        {
            $query = News::find();
//
            if(\Yii::$app->user->identity->status === 'jurnalist') {
                $query = $query->where(['user_id' => \Yii::$app->user->identity->getId()]);
            }
            // add conditions that should always apply here

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

            $this->load($params);

            if (!$this->validate()) {
                // uncomment the following line if you do not want to return any records when validation fails
                // $query->where('0=1');
                return $dataProvider;
            }

            // grid filtering conditions
            $query->andFilterWhere([
                'id'          => $this->id,
                'user_id'     => $this->user_id,
                'date'        => $this->date,
                'views'       => $this->views,
                'recommend'   => $this->recommend,
                'category_id' => $this->category_id,
                'isSlider'      => $this->isSlider,
            ]);

            $query->andFilterWhere(['like', 'title', $this->title])
                ->andFilterWhere(['like', 'content', $this->content])
                ->andFilterWhere(['like', 'img', $this->img])
                ->andFilterWhere(['like', 'lang', $this->lang]);

            if (!empty($lang)) {
                $query->where(['lang' => $lang]);
            }

            if ($category_id > 0) {
                $query->andWhere(['category_id' => $category_id]);
            }

            return $dataProvider;
        }
    }
