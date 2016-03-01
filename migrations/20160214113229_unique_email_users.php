<?php

use Phinx\Migration\AbstractMigration;

class UniqueEmailUsers extends AbstractMigration
{
    public function change()
    {
        $table = $this->table('users');
        $table->addIndex(['email'], ['unique' => true])
              ->save();
    }
}
