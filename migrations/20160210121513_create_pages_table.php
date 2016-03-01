<?php

use Phinx\Migration\AbstractMigration;

class CreatePagesTable extends AbstractMigration
{
    public function up()
    {
        $users = $this->table('pages');
        $users->addColumn('user_id', 'integer')
              ->addForeignKey('user_id', 'users', 'id', ['delete' => 'cascade', 'update' => 'cascade'])
              ->addColumn('browser_title', 'string')
              ->addColumn('title', 'string', ['null' => true])
              ->addColumn('page_content', 'text', ['null' => true])
              ->addColumn('picture', 'string', ['null' => true])
              ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
              ->addColumn('updated_at', 'datetime', ['null' => true])
              ->save(); 
    }

    public function down()
    {
        $this->dropTable('pages');
    }
}
