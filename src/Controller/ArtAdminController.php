<?php
namespace App\Controller;

use App\Entity\Art;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtAdminController extends AbstractController
{
    /**
     * @Route("/admin/cell/new")
     */
    public function new(EntityManagerInterface $em)
    {
        $cell = (new Art())
            ->setTitle('Machin Patin Couffin')
            ->setSlug("machin-patin-couffin-" . rand(100, 999))
            ->setContent("Bonjour _comment_ ALLEZ **VOUS** ?");

        // publish most articles
        if (rand(1, 10) > 2) {
            $cell->setPublishedAt(new \DateTime(sprintf('-%d days', rand(1, 100))));
        }

        $em->persist($cell);
        $em->flush();

        return new Response(sprintf(
            'Yass! id: #%d slug: %s',
            $cell->getId(),
            $cell->getSlug()
        ));
    }
}
