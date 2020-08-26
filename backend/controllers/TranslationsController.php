<?php

    namespace backend\controllers;

    use common\models\Translations;
    use Yii;
    use yii\data\ActiveDataProvider;
    use yii\filters\AccessControl;
    use yii\filters\VerbFilter;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;

    class TranslationsController extends Controller
    {
        /**
         * {@inheritdoc}
         */
        public function behaviors()
        {
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs'  => [
                    'class'   => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ];
        }

        /**
         * Lists all Translations models.
         * @return mixed
         */
        public function actionIndex()
        {
            $dataProvider = new ActiveDataProvider([
                'query' => Translations::find(),
            ]);

            return $this->render('index', [
                'dataProvider' => $dataProvider,
            ]);
        }

        /**
         * Displays a single Translations model.
         * @param integer $id
         * @return mixed
         * @throws NotFoundHttpException if the model cannot be found
         */
        public function actionView($id)
        {
            return $this->render('view', [
                'model' => $this->findModel($id),
            ]);
        }

        /**
         * Creates a new Translations model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         * @return mixed
         */
        public function actionCreate()
        {
            $model = new Translations();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {

                Yii::$app->cacheFrontend->flush();

                return $this->redirect(['create']);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }

        /**
         * Updates an existing Translations model.
         * If update is successful, the browser will be redirected to the 'view' page.
         * @param integer $id
         * @return mixed
         * @throws NotFoundHttpException if the model cannot be found
         */
        public function actionUpdate($id)
        {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {

                Yii::$app->cacheFrontend->flush();

                return $this->redirect(['index']);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }

        /**
         * Deletes an existing Translations model.
         * If deletion is successful, the browser will be redirected to the 'index' page.
         * @param integer $id
         * @return mixed
         * @throws NotFoundHttpException if the model cannot be found
         * @throws \Throwable
         * @throws \yii\db\StaleObjectException
         */
        public function actionDelete($id)
        {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }

        /**
         * Finds the Translations model based on its primary key value.
         * If the model is not found, a 404 HTTP exception will be thrown.
         * @param integer $id
         * @return Translations the loaded model
         * @throws NotFoundHttpException if the model cannot be found
         */
        protected function findModel($id)
        {
            if (($model = Translations::findOne($id)) !== null) {
                return $model;
            }

            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
