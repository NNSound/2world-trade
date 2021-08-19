<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "trade_list".
 *
 * @property int $id
 * @property int $server
 * @property int $seller 賣方
 * @property int|null $buyer 買方
 * @property int $status 狀態
 * @property int $sell_item 販售物品
 * @property int $sell_item_type 販售物品類型
 * @property int $need_item 需求物品
 * @property int $need_item_type 需求物品類型
 * @property string|null $message 訊息
 * @property string $create_at 建立時間
 * @property string|null $update_at 更新時間
 * @property string|null $finished_at 完成時間
 *
 * @property Item $sellItem 販賣物品
 * @property Item $needItem 販賣物品
 * @property User $sellerModel 買方 model
 * @property User $buyerModel  賣方 model
 */
class TradeList extends \yii\db\ActiveRecord
{
    const STATUS_WAITING = 0;
    const STATUS_CHARGE = 5;
    const STATUS_FINISHED = 10;
    const STATUS_BAN = 9999;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'trade_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['server', 'seller', 'status', 'sell_item', 'sell_item_type', 'need_item', 'need_item_type', 'create_at'], 'required'],
            [['buyer', 'status', 'sell_item', 'sell_item_type', 'need_item', 'need_item_type'], 'default', 'value' => null],
            [['server', 'seller', 'buyer', 'status', 'sell_item', 'sell_item_type', 'need_item', 'need_item_type'], 'integer'],
            [['create_at', 'update_at', 'finished_at'], 'safe'],
            [['message'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'server' => '伺服器',
            'seller' => '賣方',
            'buyer' => '買方',
            'status' => '狀態',
            'sell_item' => '販售物品',
            'sell_item_type' => '販售物品類型',
            'need_item' => '需求物品',
            'need_item_type' => '需求物品類型',
            'message' => '訊息',
            'create_at' => '建立時間',
            'update_at' => '更新時間',
            'finished_at' => '完成時間',
        ];
    }

    /**
     * @return string[]
     */
    public function getStatusLabel() {
        return [
            self::STATUS_WAITING => '可交易',
            self::STATUS_CHARGE => '等待交易',
            self::STATUS_FINISHED => '完成',
            self::STATUS_BAN => '廢除',
        ];
    }

    public static function getAllItemType()
    {
        $query = ItemType::find();
        $ids = $query->asArray()->all();

        return ArrayHelper::map($ids, 'id', 'name');
    }

    public static function getAllItem($itemType = null)
    {
        $query = Item::find();
        if ($itemType != null) {
            $query->where(['item_type' => $itemType]);
        }
        $ids = $query->asArray()->all();
        $name = ArrayHelper::map($ids, 'id', 'name');
        $option = [];
        foreach ($ids as $row) {
            $option[$row['id']]['data-target'] = $row['item_type'];
        }
        $res['name'] = $name;
        $res['option'] = $option;

        return $res;
    }

    /**
     * @return array|\yii\db\ActiveRecord|null
     */
    public function getSellItem()
    {
        return $this->hasOne(Item::class, ['id' => 'sell_item'])->one();
    }

    /**
     * @return array|\yii\db\ActiveRecord|null
     */
    public function getNeedItem()
    {
        return $this->hasOne(Item::class, ['id' => 'need_item'])->one();
    }

    public function getSellerModel()
    {
        return $this->hasOne(User::class, ['id' => 'seller'])->one();
    }

    public function getBuyerModel()
    {
        return $this->hasOne(User::class, ['id' => 'buyer'])->one();
    }
}
