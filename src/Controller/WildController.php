<?php
// src/Controller/WildController.php
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route ("/", name="wild_")
 * @package App\Controller
 */
Class WildController extends AbstractController
{
    /**
     * @Route("/wild", name="wild_index")
     */
    public function index() : Response
    {
        return $this->render('wild/index.html.twig', [
            'website' => 'Wild Séries',
        ]);
    }
    /**
     * @Route("/wild/show/{slug}", requirements={"slug"="[a-z0-9-]+"}, name="wild_show",
     *     defaults={"slug" = "Aucune série sélectionnée, veuillez choisir une série"})
     *
     *
     */
    public function show (string $slug ) : Response
    {
        $slug = str_replace("-", " ", $slug);
        $slug = ucwords($slug);
        return $this->render('wild/show.html.twig', [
            'slug' => $slug,
        ]);
    }
}