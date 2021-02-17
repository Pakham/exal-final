<?php

namespace App\Controller;

use App\Entity\Game;
use App\Form\AddGamesType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GamesController extends AbstractController
{
    /**
     * @Route("/games-dev", name="games")
     */
    public function index(): Response
    {
        return $this->render('games/addGamesForm.html.twig', [
            'controller_name' => 'GamesController',
        ]);
        
    }

    /**
     * @Route("/addgames", name="game_create")
     */
    public function createGames(Request $request){
        $game = new Game();
        $form = $this->createForm(AddGamesType::class, $game);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($game);
            $manager->flush();
                $this->addFlash(
                    'success',
                    'Le jeux a bien été ajoutée.'
                );
                return $this->redirectToRoute('home');
            } else {
                $this->addFlash(
                    'danger',
                    'Une erreur est survenue lors de l\'ajout du jeux'
                );
            }
            
        return $this->render('games/addGamesForm.html.twig', [
            'addGamesForm' => $form->createView()
        ]);
    }
}