<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TradeList */

$this->title = '新增交易';
$this->params['breadcrumbs'][] = ['label' => '交易版', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trade-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
