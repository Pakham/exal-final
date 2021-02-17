<?php

namespace App\Controller;

use App\Entity\Player;
use App\Form\AddPlayersType;
use App\Repository\PlayerRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PlayersController extends AbstractController
{
    /**
     * @Route("/players", name="players")
     */
    public function index(PlayerRepository $playerRepository): Response
    {
        $player = $playerRepository->findAll();
        return $this->render('home/index.html.twig', [
            'Player' => $player,
        ]);
    }
    /**
     * @Route("/addplayers", name="player_create")
     */
    public function createPlayers(Request $request){
        $player = new Player();
        $form = $this->createForm(AddPlayersType::class, $player);
        $form->handleRequest($request);
        if ($form->isSubmitted()) {
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($player);
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
        return $this->render('players/addplayersForm.html.twig', [
            'addPlayersForm' => $form->createView()
        ]);
    }
}
