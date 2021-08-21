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

    <div class="btn-group col-xs-12" style="margin-bottom: 20px">
        <?php

        $btn = "";

        if ($model->seller == Yii::$app->user->getId()) {
            if ($model->status == TradeList::STATUS_WAITING) {
                $btn .= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']);
            }

            if ($model->status == TradeList::STATUS_CHARGE) {
                $btn .= Html::a('結束交易', ['finished', 'id' => $model->id], ['class' => 'btn btn-success']);
            }

            $btn .= Html::a('刪除', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => '你確定要刪除本筆交易?',
                    'method' => 'post',
                ],
            ]);

        } else {
            if ($model->status == TradeList::STATUS_WAITING) {
                $btn .= Html::a('交易', ['charge', 'id' => $model->id], [
                    'class' => 'btn btn-warning',
                    'data' => [
                        'method' => 'post',
                    ],
                ]);
            }

        }
        echo $btn;
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
                    if ($model->seller == $user->getId() || $model->buyer == $user->getId()) {
                        return $model->sellerModel->game_id;
                    }
                    return '*******(交易後顯示)';
                }
            ],
            [
                'attribute' => 'buyer',
                'value' => function (TradeList $model) {
                    $user = Yii::$app->user;
                    if ($model->seller == $user->getId() || $model->buyer == $user->getId()) {
                        return $model->buyerModel->game_id;
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

<div>
    <p class="p-4"></p>
</div>
