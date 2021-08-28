<?php

use yii\db\Migration;

/**
 * Class m210828_102447_insert_item_roleaction
 */
class m210828_102447_insert_item_roleaction extends Migration
{
    public $tableName = '{{%item_type}}';
    public $itemTableName = '{{%item}}';
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //挫折姿勢
        $this->insert($this->tableName, [
            'name' => '挫折姿勢',
        ]);
        $id = Yii::$app->db->getLastInsertID();
        $this->insert($this->itemTableName, [
            'name' => '流氓挫折姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '破壞者挫折姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '巫師挫折姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '技師挫折姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '劍士挫折姿勢',
            'item_type' => $id,
        ]);

        //開心姿勢
        $this->insert($this->tableName, [
            'name' => '開心姿勢',
        ]);
        $id = Yii::$app->db->getLastInsertID();
        $this->insert($this->itemTableName, [
            'name' => '流氓開心姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '破壞者開心姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '巫師開心姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '技師開心姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '劍士開心姿勢',
            'item_type' => $id,
        ]);

        //感謝姿勢
        $this->insert($this->tableName, [
            'name' => '感謝姿勢',
        ]);
        $id = Yii::$app->db->getLastInsertID();
        $this->insert($this->itemTableName, [
            'name' => '流氓感謝姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '破壞者感謝姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '巫師感謝姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '技師感謝姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '劍士感謝姿勢',
            'item_type' => $id,
        ]);

        //嘲笑姿勢
        $this->insert($this->tableName, [
            'name' => '嘲笑姿勢',
        ]);
        $id = Yii::$app->db->getLastInsertID();
        $this->insert($this->itemTableName, [
            'name' => '流氓嘲笑姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '破壞者嘲笑姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '巫師嘲笑姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '技師嘲笑姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '劍士嘲笑姿勢',
            'item_type' => $id,
        ]);

        //悲傷姿勢
        $this->insert($this->tableName, [
            'name' => '悲傷姿勢',
        ]);
        $id = Yii::$app->db->getLastInsertID();
        $this->insert($this->itemTableName, [
            'name' => '流氓悲傷姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '破壞者悲傷姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '巫師悲傷姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '技師悲傷姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '劍士悲傷姿勢',
            'item_type' => $id,
        ]);


        //背影姿勢
        $this->insert($this->tableName, [
            'name' => '背影姿勢',
        ]);
        $id = Yii::$app->db->getLastInsertID();
        $this->insert($this->itemTableName, [
            'name' => '流氓背影姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '破壞者背影姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '巫師背影姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '技師背影姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '劍士背影姿勢',
            'item_type' => $id,
        ]);

        //攻擊姿勢
        $this->insert($this->tableName, [
            'name' => '攻擊姿勢',
        ]);
        $id = Yii::$app->db->getLastInsertID();
        $this->insert($this->itemTableName, [
            'name' => '流氓攻擊姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '破壞者攻擊姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '巫師攻擊姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '技師攻擊姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '劍士攻擊姿勢',
            'item_type' => $id,
        ]);


        //防禦姿勢
        $this->insert($this->tableName, [
            'name' => '防禦姿勢',
        ]);
        $id = Yii::$app->db->getLastInsertID();
        $this->insert($this->itemTableName, [
            'name' => '流氓防禦姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '破壞者防禦姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '巫師防禦姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '技師防禦姿勢',
            'item_type' => $id,
        ]);
        $this->insert($this->itemTableName, [
            'name' => '劍士防禦姿勢',
            'item_type' => $id,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210828_102447_insert_item_roleaction cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210828_102447_insert_item_roleaction cannot be reverted.\n";

        return false;
    }
    */
}
