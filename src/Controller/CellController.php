<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class CellController extends AbstractController
{
    /**
     * @Route("/", name= "home")
     */
    public function home()
    {
        return $this->render("page/home.html.twig", [
            "title" => "Home",
        ]);
    }

    /**
     * @Route("/news/{title}", name="news")
     */
    public function news(string $title = "world")
    {
        return $this->render("page/art.html.twig", [
            "title" => $this->titleIze($title),
        ]);
    }

    private function titleIze(string $str): string
    {
        $spaced = preg_replace("/\W/u", " ", $str);
        $capitalized = ucwords($spaced);
        return $capitalized;
    }

    /**
     * @Route("/news/{title}/heart", name="news_toggle_heart", methods={"POST"})
     */
    public function toggleHeart(string $title): JsonResponse
    {
        return $this->json([
            "hearts" => rand(5, 100),
        ]);
    }
}
