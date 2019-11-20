<?php
// src/Controller/WildController.php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

Class WildController extends AbstractController
{
    /**
     * @Route("/wild", name="wild_index")
     */
    public function index(): Response
    {
        return $this->render('wild/index.html.twig', [
            'website' => 'wild Séries',
        ]);
    }

    /**
     * @Route("/wild/show/{slug<^[a-z0-9-]+$>}",
     *     defaults={"slug"= null},
     *     name="wild_show"
     * )
     * @return Response
     */
    public function show( $slug): Response
    {
        if (!$slug) {
            throw $this -> createNotFoundException("No slug has been sent to find a program in program\'s table .");
        }
        $slug = preg_replace(
            '/-/',
            ' ', ucwords($slug)
        );

        return $this->render('wild/show.html.twig', [
            'slug' => $slug,
        ]);

    }

}

