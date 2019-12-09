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
     * @param Actor $actors
     * @param Program $programs
     * @return Response A Response instance
     * @Route("/{id}", name="index")
     */
    public function index(Actor $actor):Response
    {
        $program = $actor->getPrograms();
        return $this->render('wild/actor.html.twig', [
            'actor' => $actor,
            'programs' => $program,
        ]);
    }

}
