<?php

use Phinx\Migration\AbstractMigration;

class AddNumToPages extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('pages');
        $table->addColumn('num', 'integer', ['null' => true])
              ->save();
    }
}
