<?php

use Phinx\Migration\AbstractMigration;

class AddTagsToPages extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('pages');
        $table->addColumn('tags', 'string', ['null' => true])
              ->save();
    }
}
