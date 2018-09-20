<?php

namespace App\Controller;

use Michelf\MarkdownInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\AdapterInterface;
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
     * @Route("/art/{slug}", name="art")
     */
    public function art(
        string $slug = "world",
        MarkdownInterface $markdown,
        AdapterInterface $cache
    ) {
        $content = 'This *is* some __markdown__';

        $item = $cache->getItem('markdown_' . md5($content));
        if (!$item->isHit()) {
            $item->set($markdown->transform($content));
            $cache->save($item);
        }
        $content = $item->get();

        return $this->render("page/art.html.twig", [
            "title" => $this->titleIze($slug),
            "content" => $content,
            "slug" => $slug,
        ]);
    }

    private function titleIze(string $str): string
    {
        $spaced = preg_replace("/\W/u", " ", $str);
        $capitalized = ucwords($spaced);
        return $capitalized;
    }

    /**
     * @Route("/news/{slug}/heart", name="news_toggle_heart", methods={"POST"})
     */
    public function toggleHeart(string $slug): JsonResponse
    {
        return $this->json([
            "hearts" => rand(5, 100),
            "slug" => $slug,
        ]);
    }
}
