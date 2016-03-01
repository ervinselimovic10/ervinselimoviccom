<?php

use Phinx\Migration\AbstractMigration;

class SeedCommentsTable extends AbstractMigration
{
    public function up()
    {
        $this->execute("
            insert into comments (user_id, page_id, comment)
            values (1, 
                    1, 
                    'TestCommentOnTestPage-PostedUserErvinSelimovic')
        ");
    }

    public function down()
    {

    }
}
