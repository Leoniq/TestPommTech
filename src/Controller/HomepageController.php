<?php

namespace App\Controller;

use App\Repository\PostsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomepageController extends AbstractController
{
    /**
     * @param PostsRepository $postsRepository
     *
     * @return Response
     */
    public function indexAction(PostsRepository $postsRepository): Response
    {
        return $this->render('home/index.html.twig', [
            'posts' => $postsRepository->findAll()
        ]);
    }
}