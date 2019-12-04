<?php
namespace App\Controller;

use App\Entity\Actor;
use App\Entity\Program;
use App\Repository\ActorRepository;
use App\Repository\ProgramRepository;
use App\Form\ProgramType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Common\Persistence;
/**
 * @Route("/actor")
 */
class ActorController extends AbstractController
{

    /**
     * @Route("/", name="actors")
     */
    public function index(ActorRepository $actorRepository): Response
    {
        return $this->render('wild/actor.html.twig', [
            'actors' => $actorRepository->findAll(),
        ]);
    }

    /**
     * @Route("/{id}", name="actor")
     */
    public function show(Actor $actor, Program $program): Response
    {
        return $this->render('wild/actor.html.twig', [
            'actor' => $actor,
            'program' => $program->getActors(),
        ]);

    }




}
