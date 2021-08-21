<?php

use common\models\TradeList;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $searchModel  frontend\models\TradeListSearch */

$this->title = '我的交易';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trade-list-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_search-user', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            [
                'attribute' => 'server',
                'value' => function (TradeList $model) {
                    return \yii\helpers\ArrayHelper::getValue(\common\models\User::getServerList(), $model->server);
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
//            'message',
            'create_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
                'buttons' => [
                    'view' => function ($url, TradeList $model) {
                        return Html::a('<span class="btn btn-success">查看</span>', ['view', 'id' => $model->id], ['title' => '更新']);
                    }
                ]
            ],
        ],
    ]); ?>


</div>
