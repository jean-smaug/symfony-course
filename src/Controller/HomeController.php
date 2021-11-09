<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render("home.html.twig", [
            "name" => "Maxime",
            "age" => 25
        ]);
    }

    /**
     * @Route("/fake", name="fake")
     */
    public function fake(HttpClientInterface $httpClient): Response
    {
        $response = $httpClient->request(
            'GET',
            'https://jsonplaceholder.typicode.com/users'
        );

        return $this->render("fake.html.twig", [
            "users" => $response->toArray()
        ]);
    }
}
