<?php

use Phinx\Migration\AbstractMigration;

class SlugPagesTable extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('pages');
        $table->addColumn('slug', 'string', ['null' => true])
              ->addIndex(['slug'], ['unique' => true])
              ->save();
    }
}
