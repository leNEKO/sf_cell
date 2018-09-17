<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CellController extends AbstractController
{
    /**
     * @Route("/", name= "app_home")
     */
    public function home()
    {
        return $this->render("home.html.twig", [
            "title" => "Home",
        ]);
    }

    /**
     * @Route("/news/{title}", name="app_news")
     */
    public function news(string $title = "world")
    {
        return $this->render("article/art.html.twig", [
            "title" => $title,
        ]);
    }
}
