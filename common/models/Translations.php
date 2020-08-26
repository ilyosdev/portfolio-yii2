<?php

    namespace common\models;

    use Yii;
    use yii\db\ActiveRecord;

    /**
     * This is the model class for table "translations".
     *
     * @property int $id
     * @property string $uz
     * @property string $kk
     * @property string $code
     */
    class Translations extends ActiveRecord
    {
        /**
         * {@inheritdoc}
         */
        public static function tableName()
        {
            return 'translations';
        }

        /**
         * {@inheritdoc}
         */
        public function rules()
        {
            return [
                [['uz', 'kk', 'code'], 'required'],
                [['uz', 'kk', 'code'], 'trim'],
                [['uz', 'kk', 'code'], 'string', 'max' => 255],
            ];
        }

        /**
         * {@inheritdoc}
         */
        public function attributeLabels()
        {
            return [
                'id'   => Yii::t('app', 'ID'),
                'uz'   => Yii::t('app', 'Uz'),
                'kk'   => Yii::t('app', 'Kk'),
                'code' => Yii::t('app', 'Code'),
            ];
        }
    }
