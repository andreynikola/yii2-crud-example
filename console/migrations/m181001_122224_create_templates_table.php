<?php

use yii\db\Migration;

/**
 * Handles the creation of table `templates`.
 */
class m181001_122224_create_templates_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('templates', [
            'id' => $this->primaryKey(),
            'title' => $this->string(255)->notNull(),
            'content' => $this->text(),
            'file_name' => $this->string(255)->notNull(),
            'date_create' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
            'date_change' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP')
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('templates');
    }
}
