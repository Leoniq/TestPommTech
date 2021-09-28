<?php

use Phinx\Migration\AbstractMigration;

final class Posts extends AbstractMigration
{
    public function up(): void
    {
        $sql = <<<SQL
            CREATE TABLE posts
            (
              id serial NOT NULL
                  CONSTRAINT posts_pk PRIMARY KEY,
              name varchar(50) NOT NULL,
              text text
            );
SQL;

        $this->query($sql);

        $sql = <<<SQL
            INSERT INTO posts (name, text)
            VALUES
             ('Mark', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.'),
             ('Alex', 'Every year more than 300 million tons of plastic are not recycled. The consequences for the nature are very serious, especially for the oceans. According to the American magazine ‘Science’ the oceans contain more than 110 million tons of plastic waste.')
            ;
SQL;
        $this->query($sql);
    }

    public function down(): void
    {
        $this->query('DROP TABLE posts;');
    }
}
