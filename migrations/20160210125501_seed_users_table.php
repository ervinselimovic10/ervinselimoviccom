<?php

// use Phinx\Migration\AbstractMigration;
// use Onz\Validation\Hasher;

// class SeedUsersTable extends AbstractMigration
// {
//     public function up()
//     {
//         $hash = new Hasher;
//         $pass = $hash->hashPass(
//             'linux', 
//             $hash->regNonce('Ervin', 'onesnzeros10@yahoo.com')
//         );

//         $this->execute("
//             insert into users (first_name, last_name, email, password)
//             values ('Ervin', 
//                     'Selimovic', 
//                     'eracserv@gmail.com',
//                     '$pass')
//         ");
//     }

//     public function down()
//     {

//     }
// }
