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
        return $this->render("page/home.html.twig", [
            "title" => "Home",
        ]);
    }

    /**
     * @Route("/news/{title}", name="app_news")
     */
    public function news(string $title = "world")
    {
        return $this->render("page/art.html.twig", [
            "title" => $this->titleize($title),
        ]);
    }

    private function titleize(string $str): string
    {
        $spaced = preg_replace("/\W/u", " ", $str);
        $capitalized = ucwords($spaced);
        return $capitalized;
    }
}
