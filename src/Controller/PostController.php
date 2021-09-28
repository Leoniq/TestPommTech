<?php

namespace App\Controller;

use App\Model\DbGreen\PublicSchema\Posts;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class PostController extends AbstractController
{
    /**
     * @param Posts $posts
     *
     * @ParamConverter("posts", converter="posts")
     *
     * @return Response
     */
    public function readPostAction(Posts $posts): Response
    {
        return $this->render('post/index.html.twig', [
            'posts' => $posts
        ]);
    }
}