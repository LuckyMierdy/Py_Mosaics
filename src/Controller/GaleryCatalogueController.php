<?php

namespace App\Controller;

use App\Repository\GaleryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GaleryCatalogueController extends AbstractController
{
  #[Route('/galery/catalogue', name: 'app_galery_catalogue')]
  public function index(GaleryRepository $galeryRepository): Response
  {
    return $this->render('galery_catalogue/index.html.twig', [
      'galeries' => $galeryRepository->findAll(),
    ]);
  }
}
