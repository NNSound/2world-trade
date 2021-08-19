<?php

use yii\db\Migration;

/**
 * Class m210814_190300_item_type
 */
class m210814_190300_item_type extends Migration
{
    public $tableName = '{{%item_type}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('物品類型'),
        ]);

        $this->insert($this->tableName, [
            'name' => '一星書頁',
        ]);
        $this->insert($this->tableName, [
            'name' => '二星書頁',
        ]);
        $this->insert($this->tableName, [
            'name' => '三星書頁',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210814_190300_item_type cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210814_190300_item_type cannot be reverted.\n";

        return false;
    }
    */
}
