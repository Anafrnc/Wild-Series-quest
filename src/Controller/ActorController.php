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
 * @Route("/actor", name="actor_")
 */
class ActorController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(ActorRepository $actorRepository):Response
    {
        return $this->render('wild/actor.html.twig', [
            'actors' => $actorRepository->findAll(),
        ]);
    }
    /**
     * @Route("/{id}", name="details")
     */
    public function show(Actor $actor):Response
    {
        if (!$actor) {
            throw $this
                ->createNotFoundException('No parameter has been sent to find an actor');
        }
        return $this->render('wild/actor.html.twig', ['actors'=>$actor]);
    }
}
