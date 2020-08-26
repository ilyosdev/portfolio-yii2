<?php

    namespace backend\models;

    use common\models\User;
    use Yii;
    use yii\base\Model;

    /**
     * Signup form
     */
    class ProfileUserForm extends Model
    {
        public $old_password;
        public $new_password;
        public $new_password_confirm;

        /**
         * {@inheritdoc}
         */
        public function rules()
        {
            return [
                ['old_password', 'required'],
                ['old_password', 'string', 'min' => 6],

                ['old_password', 'findPasswords'],

                ['new_password', 'required'],
                ['new_password', 'string', 'min' => 6],

                ['new_password_confirm', 'required'],
                ['new_password_confirm', 'string', 'min' => 6],


                ['new_password_confirm', 'compare', 'compareAttribute' => 'new_password'],
            ];
        }

        /**
         * {@inheritdoc}
         */
        public function attributeLabels()
        {
            return [
                'old_password'         => Yii::t('app', 'Old password'),
                'new_password'         => Yii::t('app', 'New password'),
                'new_password_confirm' => Yii::t('app', 'New password confirm'),
            ];
        }

        /**
         * Signs user up.
         *
         * @return bool whether the creating new account was successful and email was sent
         */
        public function updatePassword()
        {
            if (!$this->validate()) {
                return null;
            }

            $user = User::find()->where(['id' => Yii::$app->user->getId() ])->one();

            $user->setPassword($this->new_password);
            $user->generateAuthKey();
            return $user->save();

        }

        public function findPasswords($attribute, $params)
        {
            $user = User::find()->where(['id' => Yii::$app->user->getId() ])->one();
            $password = $user->password_hash;
            $validateOldPass = Yii::$app->security->validatePassword($this->old_password, $password);
            if (!$validateOldPass) {
                $this->addError($attribute, Yii::t('app', 'Old password is incorrect'));
            }
        }


    }