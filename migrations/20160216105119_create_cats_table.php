<?php

use Phinx\Migration\AbstractMigration;

class CreateCatsTable extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('cats');
        $table->addColumn('browser_title', 'string')
              ->addColumn('title', 'string')
              ->addColumn('slug', 'string')
              ->addColumn('created_at', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
              ->addColumn('updated_at', 'datetime', ['null' => true])
              ->save();  
    }
}
