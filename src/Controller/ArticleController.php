<?php

namespace App\Controller;

use App\Entity\Article;
use App\Repository\ArticleRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    #[Route('/articles', name: 'article_index')]
    public function index(ArticleRepository $articleRepository): Response
    {
        $articles = $articleRepository->findBy([], ["date" => "DESC"]);

        return $this->render('article/index.html.twig', [
            "articles" => $articles
        ]);
    }

    #[Route('/articles/{id}', name: 'article_show')]
    public function show(Article $article): Response
    {
        return $this->render("article/show.html.twig", [
            "article" => $article
        ]);
    }
}
