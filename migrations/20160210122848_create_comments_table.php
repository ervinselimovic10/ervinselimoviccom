<?php

use Phinx\Migration\AbstractMigration;

class CreateCommentsTable extends AbstractMigration
{
    public function up()
    {
        $users = $this->table('comments');
        $users->addColumn('user_id', 'integer')
              ->addForeignKey('user_id', 'users', 'id', ['delete' => 'cascade', 'update' => 'cascade'])
              ->addColumn('page_id', 'integer')
              ->addForeignKey('page_id', 'pages', 'id', ['delete' => 'cascade', 'update' => 'cascade'])
              ->addColumn('comment', 'text')
              ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
              ->addColumn('updated_at', 'datetime', ['null' => true])
              ->save();         
    }

    public function down() 
    {
        $this->dropTable('comments');
    }
}
