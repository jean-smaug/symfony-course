<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    #[Route('/search', name: 'search')]
    public function index(ArticleRepository $articleRepository, Request $request): Response
    {
        $search = $request->get("q");

        $articles = $articleRepository->searchByTitle($search);

        return $this->json($articles);
    }
}
