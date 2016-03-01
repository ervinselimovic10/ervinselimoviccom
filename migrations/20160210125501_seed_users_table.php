<?php

use Phinx\Migration\AbstractMigration;
use Onz\Validation\Hasher;

class SeedUsersTable extends AbstractMigration
{
    public function up()
    {
        $hash = new Hasher;
        $pass = $hash->hashPass(
            'bypass', 
            $hash->regNonce('Ervin', 'onesnzeros10@yahoo.com')
        );

        $this->execute("
            insert into users (first_name, last_name, email, password)
            values ('Ervin', 
                    'Selimovic', 
                    'onesnzeros10@yahoo.com',
                    '$pass')
        ");
    }

    public function down()
    {

    }
}
