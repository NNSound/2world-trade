<?php

use yii\db\Migration;

/**
 * Class m210814_190326_item
 */
class m210814_190326_item extends Migration
{
    public $tableName = '{{%item}}';

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->comment('名稱'),
            'item_type' => $this->integer()->notNull()->comment('類型'),
        ]);


        $this->insert($this->tableName, [
            'name' => '一星火書頁',
            'item_type' => 1,
        ]);
        $this->insert($this->tableName, [
            'name' => '一星草書頁',
            'item_type' => 1,
        ]);
        $this->insert($this->tableName, [
            'name' => '一星水書頁',
            'item_type' => 1,
        ]);
        $this->insert($this->tableName, [
            'name' => '一星光書頁',
            'item_type' => 1,
        ]);
        $this->insert($this->tableName, [
            'name' => '一星闇書頁',
            'item_type' => 1,
        ]);
        $this->insert($this->tableName, [
            'name' => '一星被動書頁',
            'item_type' => 1,
        ]);

        $this->insert($this->tableName, [
            'name' => '二星火書頁',
            'item_type' => 2,
        ]);
        $this->insert($this->tableName, [
            'name' => '二星草書頁',
            'item_type' => 2,
        ]);
        $this->insert($this->tableName, [
            'name' => '二星水書頁',
            'item_type' => 2,
        ]);
        $this->insert($this->tableName, [
            'name' => '二星光書頁',
            'item_type' => 2,
        ]);
        $this->insert($this->tableName, [
            'name' => '二星闇書頁',
            'item_type' => 2,
        ]);
        $this->insert($this->tableName, [
            'name' => '二星被動書頁',
            'item_type' => 2,
        ]);

        $this->insert($this->tableName, [
            'name' => '三星火書頁',
            'item_type' => 3,
        ]);
        $this->insert($this->tableName, [
            'name' => '三星草書頁',
            'item_type' => 3,
        ]);
        $this->insert($this->tableName, [
            'name' => '三星水書頁',
            'item_type' => 3,
        ]);
        $this->insert($this->tableName, [
            'name' => '三星光書頁',
            'item_type' => 3,
        ]);
        $this->insert($this->tableName, [
            'name' => '三星闇書頁',
            'item_type' => 3,
        ]);
        $this->insert($this->tableName, [
            'name' => '三星被動書頁',
            'item_type' => 3,
        ]);


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210814_190326_item cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210814_190326_item cannot be reverted.\n";

        return false;
    }
    */
}
