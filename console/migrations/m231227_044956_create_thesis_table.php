<?php

use yii\db\Migration;

class m231227_044956_create_thesis_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('{{%thesis}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(1000)->notNull(),
            'slug' => $this->string(1000)->notNull(),
            'text' => $this->text()->notNull(),
            'created_time' => $this->timestamp()->notNull(),
            'created_user_id' => $this->integer()->notNull(),
            'modified_time' => $this->timestamp()->notNull(),
            'modified_user_id' => $this->integer()->notNull(),
            'deleted_time' => $this->timestamp()->notNull()
        ], 'ENGINE=InnoDB');

        $this->createIndex(
            'idx-thesis-created_user_id',
            'thesis',
            'created_user_id'
        );

        $this->createIndex(
            'idx-thesis-modified_user_id',
            'thesis',
            'modified_user_id'
        );

        $this->createIndex(
            'idx-thesis-slug',
            'thesis',
            'slug'
        );

        $this->addForeignKey(
            'fk-thesis-created_user_id',
            'thesis',
            'created_user_id',
            'user',
            'id'
        );

        $this->addForeignKey(
            'fk-thesis-modified_user_id',
            'thesis',
            'modified_user_id',
            'user',
            'id'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-thesis-created_user_id', 'thesis');
        $this->dropForeignKey('fk-thesis-modified_user_id', 'thesis');
        $this->dropIndex('idx-thesis-created_user_id', 'thesis');
        $this->dropIndex('idx-thesis-modified_user_id', 'thesis');
        $this->dropIndex('idx-thesis-slug', 'thesis');
        $this->dropTable('{{%thesis}}');
    }
}
