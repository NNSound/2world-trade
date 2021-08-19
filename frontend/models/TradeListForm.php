<?php

namespace frontend\models;

use common\models\Item;
use common\models\TradeList;
use common\models\User;

/**
 * TradeList module definition class
 */
class TradeListForm extends TradeList
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sell_item', 'sell_item_type', 'need_item', 'need_item_type'], 'required'],
            [['seller', 'buyer', 'status', 'sell_item', 'sell_item_type', 'need_item', 'need_item_type'], 'default', 'value' => null],
            [['seller', 'buyer', 'status', 'sell_item', 'sell_item_type', 'need_item', 'need_item_type'], 'integer'],
            [['create_at', 'finished_at'], 'safe'],
            [['message'], 'string', 'max' => 10],
            [['sell_item', 'need_item'], 'validateItem'],
        ];
    }

    /**
     * @param $attribute
     * @param $params
     */
    public function validateItem($attribute, $params)
    {
        $model = Item::findOne($this->$attribute);
        if ($model == null) {
            $this->addError($attribute, '物品不存在');
        }
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        if ($this->sell_item == $this->need_item) {
            $this->addError('need_item_type', '相同的交易物');
            return false;
        }

        if ($insert) {
            $this->status = TradeList::STATUS_WAITING;
        }
        $user = \Yii::$app->user;
        $this->seller = $user->getId();
        $this->server = $user->identity->server;
        $this->create_at = date('Y-m-d H:i:s');

        $sellItem = Item::findOne($this->sell_item);
        $needItem = Item::findOne($this->need_item);
        $this->sell_item_type = $sellItem->item_type;
        $this->need_item_type = $needItem->item_type;

        //書頁
        if ($this->sell_item_type <= 3 && $this->need_item_type <= 3) {
            if (abs($this->sell_item_type - $this->need_item_type) >= 2) {
                $this->addError('need_item_type', '書頁交易類型錯誤');
                return false;
            }
        } else {
            if ($this->sell_item_type != $this->need_item_type) {
                $this->addError('need_item_type', '交易類型錯誤');
                return false;
            }
        }

        return parent::beforeSave($insert);
    }
}
