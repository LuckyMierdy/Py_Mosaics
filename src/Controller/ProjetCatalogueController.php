<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Repository\ProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProjetCatalogueController extends AbstractController
{
  #[Route('/projetCatalogue', name: 'app_projet_catalogue', methods: ['GET'])]
  public function index(ProjetRepository $projetRepository): Response
  {
    return $this->render('projet_catalogue/index.html.twig', [
      'projets' => $projetRepository->findAll(),
    ]);
  }
}
