<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShowMessageController extends AbstractController
{
    #[Route('/show/message', name: 'app_show_message')]
    public function index(): Response
    {
        return $this->render('show_message/index.html.twig', [
            'controller_name' => 'ShowMessageController',
        ]);
    }
}
