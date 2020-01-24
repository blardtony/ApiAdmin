<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Game;

class GameController extends AbstractController
{
    /**
     * @Route("/game", name="game")
     */
    public function showAllGame()
    {
      $games = $this->getDoctrine()->getRepository(Game::class)->findAll();

      $response = [];

      foreach ($games as $game) {
        $response[] = [
          'id' => $game->getId(),
          'name' => $game->getName(),
        ];
      }

      return $this->json($response);
    }

    /**
     * @Route("/game/{id}", name="game_detail", requirements={"id"="\d+"})
     */
    public function showOneGame(int $id)
    {
      $game = $this->getDoctrine()->getRepository(Game::class)->find($id);

      if (!$game) {
        throw $this->createNotFoundException("The game doesn't exist");
      }
      $editors = [];

      $editor = $game->getEditor();
        $editors[] = [
          'id' => $editor->getId(),
          'name' => $editor->getName(),
        ];

      $response = [
        'id' => $game->getId(),
        'name' => $game->getName(),
        'review' => $game->getReview(),
        'editors' => $editors,
      ];


      return $this->json($response);
    }
}
