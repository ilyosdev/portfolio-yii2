<?php

    namespace common\models;

    use frontend\components\ImageThumb;
    use Yii;
    use yii\behaviors\TimestampBehavior;
    use yii\db\ActiveRecord;
    use yii\db\Expression;
    use yii\helpers\Html;
    use yii\helpers\Url;

    /**
     * This is the model class for table "news".
     *
     * @property int $id
     * @property string $title
     * @property string $content
     * @property int $user_id
     * @property string $date
     * @property int $views
     * @property string $img
     * @property int $recommend
     * @property int $category_id
     * @property int $isSlider
     * @property string $lang
     */
    class Blogs extends ActiveRecord
    {
        /**
         * {@inheritdoc}
         */
        public static function tableName()
        {
            return 'blogs';
        }

        public static function getById($id)
        {
            $lang = Yii::$app->language;

            return self::find()
                ->where(['lang' => $lang, 'id' => $id])
                ->one();
        }

        /**
         * {@inheritdoc}
         */
        public function rules()
        {
            return [
                [['content', 'title'], 'required'],
                [['content'], 'string'],
                [['user_id', 'views',], 'integer'],
                [['date'], 'safe'],
                [['title', 'img'], 'string', 'max' => 255],
                [['lang'], 'string', 'max' => 2],
            ];
        }

        /**
         * {@inheritdoc}
         */
        public function attributeLabels()
        {
            return [
                'id'          => Yii::t('app', 'ID'),
                'title'       => Yii::t('app', 'Title'),
                'content'     => Yii::t('app', 'Content'),
                'date'        => Yii::t('app', 'Date'),
                'views'       => Yii::t('app', 'Views'),
                'img'         => Yii::t('app', 'Img'),
                'lang'        => Yii::t('app', 'Lang'),
            ];
        }

        public function behaviors()
        {
            return [
                [
                    'class'              => TimestampBehavior::class,
                    'createdAtAttribute' => 'date',
                    'updatedAtAttribute' => null,
                    'value'              => new Expression('NOW()'),
                ],
            ];
        }

        public function getBody()
        {
            $pattern = [
                '/font-size: (\d*)pt;/',
                '/font-size: (\d*).0pt;/',
                '/font-size:(\d*)pt;/',
                '/font-size:(\d*).0pt;/',
                '/font-size:(\d*).0pt/',
                '/font-size:(\d*)pt/',
                '/font-size: (\d*)pt/',
            ];

            $replacement = [
                '',
                '',
                '',
                '',
                '',
                '',
                '',
            ];

            return preg_replace($pattern, $replacement, $this->content);
        }

        public function getAlias()
        {
            return Url::to(['/blogs/view', 'id' => $this->id]);
        }

        public function getImage()
        {
            $img = ImageThumb::def($this->img);

            return Html::img($img, ['alt' => $this->title]);
        }

        public function getDateonly()
        {
            return date("d.m.Y", strtotime($this->date));
        }
    }
