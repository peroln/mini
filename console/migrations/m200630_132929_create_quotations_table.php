<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%quotations}}`.
 */
class m200630_132929_create_quotations_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%quotations}}', [
            'id' => $this->primaryKey(),
            'value' => $this->string()->notNull(),
            'currency_id' => $this->integer()->notNull(),
            'server_time' => $this->bigInteger()->notNull(),
            'created_at' => $this->integer()->notNull()
        ]);
        // creates index for column `currency_id`
        $this->createIndex(
            'idx-quotations-currency_id',
            'quotations',
            'currency_id'
        );

        // add foreign key for table `quotations`
        $this->addForeignKey(
            'fk-quotations-currency_id',
            'quotations',
            'currency_id',
            'currencies',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `quotations`
        $this->dropForeignKey(
            'fk-quotations-currency_id',
            'quotations'
        );

        // drops index for column `currency_id`
        $this->dropIndex(
            'idx-quotations-currency_id',
            'quotations'
        );
        $this->dropTable('{{%quotations}}');
    }
}
