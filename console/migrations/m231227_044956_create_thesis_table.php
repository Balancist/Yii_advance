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
            'date' => $this->dateTime()->notNull(),
            'author' => $this->integer()->notNull()
        ], 'ENGINE=InnoDB');

        $this->createIndex(
            'idx-thesis-author',
            'thesis',
            'author'
        );

        $this->createIndex(
            'idx-thesis-slug',
            'thesis',
            'slug'
        );

        $this->addForeignKey(
            'fk-thesis-author',
            'thesis',
            'author',
            'user',
            'id'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-thesis-author', 'thesis');
        $this->dropIndex('idx-thesis-author', 'thesis');
        $this->dropIndex('idx-thesis-slug', 'thesis');
        $this->dropTable('{{%thesis}}');
    }
}
