<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PostController extends AbstractController
{
    #[Route('/post', name: 'post')]
    public function post(): Response
    {
        return $this->render('post/post.twig', [
            'post' => 'PostController',
        ]);
    }
}