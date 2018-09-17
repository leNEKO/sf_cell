<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CellController extends AbstractController
{

    public function home()
    {
        return $this->render("home.html.twig", [
            "title" => "Home",
        ]);
    }
}
