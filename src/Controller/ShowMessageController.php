<?php

namespace App\Controller;

use App\Repository\MessageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowMessageController extends AbstractController
{
  #[Route('/showMessage', name: 'app_show_message')]
  public function index(MessageRepository $messageRepository): Response
  {
    return $this->render('show_message/index.html.twig', [
      'messages' => $messageRepository->findAll(),
    ]);
  }
}
