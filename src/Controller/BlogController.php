<?php

namespace App\Controller;

use App\Entity\Articles;
use App\Repository\ArticlesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BlogController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function home(ArticlesRepository $repo): Response
    {
        // $articles = $repo->findBy(array(), array('id' => 'desc'), 3, 0);
        $lastArticles = $repo->findBy(array(), array('id' => 'desc'), 3, 0);
        $articles = $repo->findBy(array(), array('id' => 'asc'), 3, 0);
        // $articles = $repo->findAll();

        return $this->render('blog/home.html.twig', [
            'name' => 'Julien',
            'lastArticle' => $lastArticles,
            'article' => $articles,
        ]);
    }


    #[Route('/blog', name: 'blog')]

    public function index(ArticlesRepository $ripo): Response
    {
        $articles = $ripo->findAll();

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController',
            'articles' => $articles
        ]);
    }
}
