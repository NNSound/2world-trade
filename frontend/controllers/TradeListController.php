<?php

namespace frontend\controllers;

use common\models\TradeList;
use ErrorException;
use frontend\models\TradeListForm;
use frontend\models\TradeListSearch;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TradeListController implements the CRUD actions for TradeList model.
 */
class TradeListController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all TradeList models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TradeListSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andWhere(['status' => TradeList::STATUS_WAITING]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @return string
     */
    public function actionUserList()
    {
        $searchModel = new TradeListSearch();

        $user = \Yii::$app->user;
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andWhere(['seller' => $user->getId()]);
        $dataProvider->query->orWhere(['buyer' => $user->getId()]);

        return $this->render('user-list', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TradeList model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (\Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TradeList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TradeListForm();

        if (\Yii::$app->user->isGuest) {
            return $this->redirect(['site/login']);
        }

        if ($this->request->isPost) {
            try {

                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } catch (ErrorException $e) {
                \Yii::$app->session->setFlash('error', $e->getMessage());
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TradeList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = TradeListForm::findOne($id);
        if ($model === null) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        if (\Yii::$app->user->getId() != $model->seller) {
            return $this->redirect(['index']);
        }
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     */
    public function actionCharge($id)
    {
        $user = \Yii::$app->user;

        /** @var TradeList $model */
        $model = TradeList::find()->where(['id' => $id, 'status' => TradeList::STATUS_WAITING])->one();

        try {
            if ($model === null) {
                throw new ErrorException('找不到訂單.');
            }
            if ($model->seller == $user->getId()) {
                throw new ErrorException('不可以跟自己交易.');
            }
            $model->buyer = $user->getId();
            $model->status = TradeList::STATUS_CHARGE;
            $model->update_at = date('Y-m-d H:i:s');

            if ($this->request->isPost && $model->validate()) {
                $model->save();
                \Yii::$app->session->setFlash('success', '交易中, 請聯絡賣家');
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } catch (ErrorException $e) {
            \Yii::$app->session->setFlash('error', $e->getMessage());
        }

        return $this->redirect(['index']);
    }

    /**
     * @param $id
     * @return \yii\web\Response
     */
    public function actionFinished($id)
    {
        $user = \Yii::$app->user;
        /** @var TradeListForm $model */
        $model = TradeListForm::find()->where([
            'id' => $id,
            'seller' => $user->getId(),
            'status' => TradeList::STATUS_CHARGE,
        ])->one();

        try {
            if ($model == null) {
                throw new ErrorException('交易不存在或非進行中');
            }
            $model->status = TradeList::STATUS_FINISHED;

            if ($model->save()) {
                throw new ErrorException('交易狀態變更失敗');
            }
            \Yii::$app->session->setFlash('success', '交易結束');

        } catch (ErrorException $e) {
            \Yii::$app->session->setFlash('error', $e->getMessage());

        }

        return $this->redirect(['index']);
    }

    /**
     * Deletes an existing TradeList model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if (\Yii::$app->user->getId() != $model->seller) {
            return $this->redirect(['index']);
        }
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TradeList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return TradeList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TradeList::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('該頁不存在');
    }
}
