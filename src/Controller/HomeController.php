<?php

namespace App\Controller;

use App\Repository\GameRepository;
use App\Repository\PlayerRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(PlayerRepository $playerRepository, GameRepository $gamerepository): Response
    {
        $game = $gamerepository->findAll();
        $player = $playerRepository->findAll();
        return $this->render('home/index.html.twig', [
            'player' => $player,
            'game' => $game,
        ]);
    }


}


