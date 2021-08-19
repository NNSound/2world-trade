<?php

use common\models\TradeList;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\TradeList */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '交易版', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="trade-list-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="btn-group col-xs-12" style="margin-bottom: 20px">
        <?php
        if ($model->seller == Yii::$app->user->getId()) {
            echo Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
            echo Html::a('刪除', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '你確定要刪除本筆交易?',
                    'method' => 'post',
                ],
            ]);
        } else {
            Html::a('交易', ['charge', 'id' => $model->id], ['class' => 'btn btn-warring']);
        }
        ?>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'seller',
                'value' => function (TradeList $model) {
                    $user = Yii::$app->user;
                    if ($model->buyer == null && $model->seller != $user->getId()) {
                        return '*******(交易後顯示)';
                    }
                    return $model->sellerModel->username;
                }
            ],
            [
                'attribute' => 'buyer',
                'value' => function (TradeList $model) {
                    $user = Yii::$app->user;
                    if ($model->buyer == $user->getId() || $model->buyer == $user->getId()) {
                        return $model->buyerModel->username;
                    }
                    return '';
                }
            ],
            [
                'attribute' => 'status',
                'value' => function (TradeList $model) {
                    return \yii\helpers\ArrayHelper::getValue($model->getStatusLabel(), $model->status);
                }
            ],
            [
                'attribute' => 'sell_item',
                'value' => function (TradeList $model) {
                    $item = $model->sellItem;
                    return $item->name;
                }
            ],
            [
                'attribute' => 'need_item',
                'value' => function (TradeList $model) {
                    $item = $model->needItem;
                    return $item->name;
                }
            ],
            'message',
            'create_at',
            'update_at',
            'finished_at',
        ],
    ]) ?>

</div>
