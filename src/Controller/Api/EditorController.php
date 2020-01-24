<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Editor;

class EditorController extends AbstractController
{
    /**
     * @Route("/editor", name="editor")
     */
    public function index()
    {
      $editors = $this->getDoctrine()->getRepository(Editor::class)->findAll();

      return $this->json($editors);
    }
}
