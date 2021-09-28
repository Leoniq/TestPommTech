<?php

namespace App\Repository;

use App\Model\DbGreen\PublicSchema\PostsModel;
use PommProject\ModelManager\Model\CollectionIterator;

/**
 * Class TestRepository
 * @package App\Repository
 */
class PostsRepository
{
    /**
     * @var PostsModel
     */
    private $model;

    /**
     * TestRepository constructor.
     *
     * @param PostsModel $model
     */
    public function __construct(PostsModel $model)
    {
        $this->model = $model;
    }

    /**
     * @return \PommProject\ModelManager\Model\CollectionIterator
     */
    public function findAll(): CollectionIterator
    {
        return $this->model->findAll();
    }

    /**
     * @param $id
     *
     * @return array
     */
    public function findPostsById($id)
    {
        return $this->model->findPostsById($id)->current();
    }
}
