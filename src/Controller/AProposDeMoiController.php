<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AProposDeMoiController extends AbstractController
{
  #[Route('/AProposDeMoi', name: 'app_a_propos_de_moi')]
  public function index(): Response
  {
    return $this->render('a_propos_de_moi/index.html.twig', [
      'controller_name' => 'AProposDeMoiController',
    ]);
  }
}
