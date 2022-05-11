<?php

namespace App\Controller;

use App\Entity\Message;
use App\Form\ContactType;
use App\Repository\MessageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
  #[Route('/contact', name: 'app_contact')]
  public function send(Request $request, MessageRepository $messageRepository, EntityManagerInterface $entityManager): Response
  {
    $message = new message();
    $form = $this->createForm(ContactType::class, $message);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

      $entityManager->persist($message);
      $entityManager->flush();

      $messageRepository->add($message);
      return $this->redirectToRoute('app_contact', [], Response::HTTP_SEE_OTHER);
    }

    return $this->renderForm('contact/index.html.twig', [
      'contact' => $form->createView(),
      'form' => $form,
    ]);
  }
}
