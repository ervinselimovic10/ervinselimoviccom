<?php

use Phinx\Migration\AbstractMigration;

class SeedPagesTable extends AbstractMigration
{
    public function up()
    {
        $this->execute("
            insert into pages (user_id, browser_title, title, page_content, picture)
            values (1, 
                    'TestPage', 
                    'TestPageTitle',
                    'TestPageContent',
                    'test.jpg')
        ");
    }

    public function down()
    {

    }
}
