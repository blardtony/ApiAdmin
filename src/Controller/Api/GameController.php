<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Game;

class GameController extends AbstractController
{
    /**
     * @Route("/game/{id}", name="game")
     */
    public function index($id)
    {
      $game = $this->getDoctrine()->getRepository(Game::class)->find($id);
      $editor = $game->getEditor();

      return $this->json([
        'name' => $game->getName(),
        'editor' => [
          'name' => $editor->getName(),
        ]
      ]);
    }
}
