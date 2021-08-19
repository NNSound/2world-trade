<?php

use common\models\User;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\TradeListSearch */
/* @var $form yii\widgets\ActiveForm */

$allItem = $model->getAllItem();

$js = <<< JS

$('#tradelistsearch-sell_item_type').change(function() {
    var itemType = $(this).val()
    itemType = parseInt(itemType)
    $("#tradelistsearch-sell_item option").each(function() {
        $(this).show()
        $("#tradelistsearch-sell_item")[0].selectedIndex = 0;
        var attr = $(this).attr('data-target');

        if (itemType > 0 && attr != itemType) {
            $(this).hide()
        }        

    });
})

$('#tradelistsearch-need_item_type').change(function() {
    var itemType = $(this).val()
    itemType = parseInt(itemType)
    $("#tradelistsearch-need_item option").each(function() {
        $(this).show()
         $("#tradelistsearch-need_item")[0].selectedIndex = 0;
        var attr = $(this).attr('data-target');

        if (itemType > 0 && attr != itemType) {
            $(this).hide()
        }        

    });
})

JS;

$this->registerJs($js, \yii\web\View::POS_END);
?>

<div class="trade-list-form col-md-12">

    <?php $form = ActiveForm::begin([
        'method' => 'get',
        'options' => [
            'class' => 'row',
        ]
    ]); ?>

    <div class="col-md-2 padding-element">
        <?= $form->field($model, 'server')->dropDownList(User::getServerList(), ['prompt' => '全部']) ?>
    </div>

    <div class="col-md-2 padding-element">
        <?= $form->field($model, 'sell_item_type')->dropDownList($model->getAllItemType(), ['prompt' => '全部']) ?>
    </div>

    <div class="col-md-2 padding-element">
        <?= $form->field($model, 'sell_item')->dropDownList($allItem['name'], ['prompt' => '全部', 'options' => $allItem['option']]) ?>
    </div>

    <div class="col-md-2 padding-element">
        <?= $form->field($model, 'need_item_type')->dropDownList($model->getAllItemType(), ['prompt' => '全部']) ?>
    </div>

    <div class="col-md-2 padding-element">
        <?= $form->field($model, 'need_item')->dropDownList($allItem['name'], ['prompt' => '全部', 'options' => $allItem['option']]) ?>
    </div>

    <div class="form-group col-md-3">
        <?= Html::submitButton('查詢', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
