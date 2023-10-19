<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemoController extends AbstractController
{
    #[Route('/demo', name: 'demo')]
    public function demo(): Response
    {
        return $this->render('components/demo.twig', [
            'demo' => 'DemoController',
        ]);
    }
}