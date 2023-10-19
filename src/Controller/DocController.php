<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Parsedown;

class DocController extends AbstractController
{
    private $markdownParser;

    public function __construct(Parsedown $markdownParser)
    {
        $this->markdownParser = $markdownParser;
    }

    #[Route('/docs', name: 'docs')]
    public function docs()
    {
        // Read the Markdown file
        $markdownFilePath = "F:/Dev/berillium-cms/docs/demo.md";
        $markdownContent = file_get_contents($markdownFilePath);

        // Parse the Markdown content (assuming you have a Markdown service)
        $parsedContent = $this->markdownParser->text($markdownContent);

        return $this->render('doc/doc.html.twig', [
            'parsedContent' => $parsedContent,
        ]);
    }
}