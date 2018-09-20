<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class CellAdminController extends AbstractController
{
    /**
     * @Route("/admin/cell/new")
     */
    function new () {
        return new Response("Hello world");
    }
}
