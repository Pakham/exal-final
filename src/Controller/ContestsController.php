<?php

namespace App\Controller;

use App\Entity\Contest;
use App\Form\AddContestsType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContestsController extends AbstractController
{
    /**
     * @Route("/contests", name="contests")
     */
    public function index(): Response
    {
        return $this->render('contests/index.html.twig', [
            'controller_name' => 'ContestsController',
        ]);
    }


    /**
     * @Route("/addcontests", name="contest_create")
     */
    public function createContest(Request $request){
        $contest = new Contest();
        $form = $this->createForm(AddContestsType::class, $contest);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($contest);
            $manager->flush();
                $this->addFlash(
                    'success',
                    'Le joueur a bien été ajoutée.'
                );
                return $this->redirectToRoute('home');
            } else {
                $this->addFlash(
                    'danger',
                    'Une erreur est survenue lors de l\'ajout du joueur'
                );
                
            }
        return $this->render('contests/addContestsForm.html.twig', [
            'addContestsForm' => $form->createView()
        ]);
    }
}