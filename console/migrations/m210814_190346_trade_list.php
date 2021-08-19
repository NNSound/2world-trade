<?php

use yii\db\Migration;

/**
 * Class m210814_190346_trade_list
 */
class m210814_190346_trade_list extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%trade_list}}', [
            'id' => $this->primaryKey(),
            'server' => $this->integer()->notNull()->comment('伺服器'),
            'seller' => $this->integer()->notNull()->comment('賣方'),
            'buyer' => $this->integer()->comment('買方'),
            'status' => $this->integer()->notNull()->comment('狀態'),
            'sell_item' => $this->integer()->notNull()->comment('販售物品'),
            'sell_item_type' => $this->integer()->notNull()->comment('販售物品類型'),//反正規化
            'need_item' => $this->integer()->notNull()->comment('需求物品'),
            'need_item_type' => $this->integer()->notNull()->comment('需求物品類型'),//反正規化
            'message' => $this->string(10)->null()->comment('訊息'),
            'create_at' => $this->dateTime()->notNull()->comment('建立時間'),
            'update_at' => $this->dateTime()->null()->comment('更新時間'),
            'finished_at' => $this->dateTime()->null()->comment('完成時間'),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210814_190346_trade_list cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210814_190346_trade_list cannot be reverted.\n";

        return false;
    }
    */
}
