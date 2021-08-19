<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TradeList */
/* @var $form yii\widgets\ActiveForm */

$allItem = $model->getAllItem();

$js = <<< JS

$('#tradelistform-sell_item_type').change(function() {
    console.log("#tradelist-sell_item_type on change")
    var itemType = $(this).val()
    itemType = parseInt(itemType)
    $("#tradelistform-sell_item option").each(function() {
        $(this).show()
        var attr = $(this).attr('data-target');
        $("#tradelistform-sell_item")[0].selectedIndex = 0;
        if (itemType > 0 && attr != itemType) {
            $(this).hide()
        }        

    });
})

$('#tradelistform-need_item_type').change(function() {
    var itemType = $(this).val()
    itemType = parseInt(itemType)
    $("#tradelistform-need_item option").each(function() {
        $(this).show()
        var attr = $(this).attr('data-target');
        $("#tradelistform-need_item")[0].selectedIndex = 0;
        if (itemType > 0 && attr != itemType) {
            $(this).hide()
        }        

    });
})

JS;

$this->registerJs($js, \yii\web\View::POS_END);
?>

<div class="trade-list-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sell_item_type')->dropDownList($model->getAllItemType(), ['prompt' => '請選擇']) ?>

    <?= $form->field($model, 'sell_item')->dropDownList($allItem['name'], ['prompt' => '請選擇', 'options' => $allItem['option']]) ?>

    <?= $form->field($model, 'need_item_type')->dropDownList($model->getAllItemType(), ['prompt' => '請選擇']) ?>

    <?= $form->field($model, 'need_item')->dropDownList($allItem['name'], ['prompt' => '請選擇', 'options' => $allItem['option']]) ?>

    <?= $form->field($model, 'message')->textInput(['maxlength' => 20]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '更新', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
