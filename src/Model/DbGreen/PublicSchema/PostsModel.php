<?php

namespace App\Model\DbGreen\PublicSchema;

use PommProject\ModelManager\Model\Model;
use PommProject\ModelManager\Model\ModelTrait\WriteQueries;
use App\Model\DbGreen\PublicSchema\AutoStructure\Posts as PostsStructure;

/**
 * PostsModel
 *
 * Model class for table posts.
 *
 * @see Model
 */
class PostsModel extends Model
{
    use WriteQueries;

    /**
     * __construct()
     *
     * Model constructor
     *
     * @access public
     */
    public function __construct()
    {
        $this->structure = new PostsStructure;
        $this->flexible_entity_class = Posts::class;
    }

    /**
     * @param int $id
     *
     * @return \PommProject\ModelManager\Model\CollectionIterator
     */
    public function findPostsById(int $id)
    {
        $sql = <<<SQL
            SELECT *
            FROM
              :posts
            WHERE
              :condition
SQL;

        $sql = strtr($sql,
            [
                ':posts'   => $this->getStructure()->getRelation(),
                ':condition' => 'id = $*',
            ]
        );

        return $this->query($sql, [$id]);
    }
}
