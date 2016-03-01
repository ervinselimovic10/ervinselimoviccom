<?php

use Phinx\Migration\AbstractMigration;

class AddCatsToPages extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('pages');
        $table->addColumn('cat_id', 'integer', ['default' => 1])
              ->addForeignKey('cat_id', 'cats', 'id', ['delete' => 'cascade', 'update' => 'cascade'])
              ->save();
    }
}
