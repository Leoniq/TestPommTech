<?php

namespace App\Services\ParamConverter;

use App\Repository\PostsRepository;
use App\Model\DbGreen\PublicSchema\Posts;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\ParamConverterInterface;

class PostsParamConverter implements ParamConverterInterface
{
    /**
     * @var PostsRepository
     */
    protected $repository;

    /**
     * PostsParamConverter constructor.
     *
     * @param PostsRepository $repository
     */
    public function __construct(PostsRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param Request $request
     * @param ParamConverter $configuration
     *
     * @return bool|void
     */
    public function apply(Request $request, ParamConverter $configuration)
    {
        $id = $request->attributes->get('id');

        if ($id === null) {
            throw new NotFoundHttpException();
        }

        $test = $this->repository->findPostsById($id);

        $request->attributes->set($configuration->getName(), $test);
    }

    /**
     * @param ParamConverter $configuration
     *
     * @return bool
     */
    public function supports(ParamConverter $configuration): bool
    {
        return Posts::class === $configuration->getClass();
    }
}