<?php

namespace App\Controller;

use App\Entity\Galery;
use App\Form\GaleryType;
use App\Repository\GaleryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('gerant/galery')]
class GaleryController extends AbstractController
{
  #[Route('/', name: 'app_galery_index', methods: ['GET'])]
  public function index(EntityManagerInterface $entityManager): Response
  {
    $galeries = $entityManager
      ->getRepository(Galery::class)
      ->findAll();

    return $this->render('galery/index.html.twig', [
      'galeries' => $galeries,
    ]);
  }

  #[Route('/new', name: 'app_galery_new', methods: ['GET', 'POST'])]
  public function new(Request $request, GaleryRepository $galeryRepository, EntityManagerInterface $entityManager): Response
  {
    $galery = new Galery();
    $form = $this->createForm(GaleryType::class, $galery);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      /** @var UploadedFile $image1 */
      $image1 = $form->get('image1')->getData();

      if ($image1) {
        $newFilename = uniqid() . '.' . $image1->guessExtension();

        try {
          $image1->move(
            $this->getParameter('kernel.project_dir') . '/public/uploads/galerie',
            $newFilename
          );
        } catch (FileException $e) {
          $this->addFlash('error', $e->getMessage());
        }

        $galery->setImage1($newFilename);
      }

      /** @var UploadedFile $image2 */
      $image2 = $form->get('image2')->getData();

      if ($image2) {
        $newFilename = uniqid() . '.' . $image2->guessExtension();

        try {
          $image2->move(
            $this->getParameter('kernel.project_dir') . '/public/uploads/galerie',
            $newFilename
          );
        } catch (FileException $e) {
          $this->addFlash('error', $e->getMessage());
        }

        $galery->setImage2($newFilename);
      }

      /** @var UploadedFile $image3 */
      $image3 = $form->get('image3')->getData();

      if ($image3) {
        $newFilename = uniqid() . '.' . $image3->guessExtension();

        try {
          $image3->move(
            $this->getParameter('kernel.project_dir') . '/public/uploads/galerie',
            $newFilename
          );
        } catch (FileException $e) {
          $this->addFlash('error', $e->getMessage());
        }

        $galery->setImage3($newFilename);
      }


      $entityManager->persist($galery);
      $entityManager->flush();

      $galeryRepository->add($galery);
      return $this->redirectToRoute('app_galery_index', [], Response::HTTP_SEE_OTHER);
    }

    return $this->renderForm('galery/new.html.twig', [
      'galery' => $galery,
      'form' => $form,
    ]);
  }

  #[Route('/{id}', name: 'app_galery_show', methods: ['GET'])]
  public function show(Galery $galery): Response
  {
    return $this->render('galery/show.html.twig', [
      'galery' => $galery,
    ]);
  }

  #[Route('/{id}/edit', name: 'app_galery_edit', methods: ['GET', 'POST'])]
  public function edit(Request $request, Galery $galery, GaleryRepository $galeryRepository, EntityManagerInterface $entityManager): Response
  {
    $form = $this->createForm(GaleryType::class, $galery);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

      /** @var UploadedFile $image1 */
      $image1 = $form->get('image1')->getData();

      if ($image1) {
        $newFilename = $galery->getImage1();

        try {
          $image1->move(
            $this->getParameter('kernel.project_dir') . '/public/uploads/galerie',
            $newFilename
          );
        } catch (FileException $e) {
          $this->addFlash('error', $e->getMessage());
        }

        $galery->setImage1($newFilename);
      }

      /** @var UploadedFile $image2 */
      $image2 = $form->get('image2')->getData();

      if ($image2) {
        $newFilename = $galery->getImage2();

        try {
          $image2->move(
            $this->getParameter('kernel.project_dir') . '/public/uploads/galerie',
            $newFilename
          );
        } catch (FileException $e) {
          $this->addFlash('error', $e->getMessage());
        }

        $galery->setImage2($newFilename);
      }

      /** @var UploadedFile $image3 */
      $image3 = $form->get('image3')->getData();

      if ($image3) {
        $newFilename = $galery->getImage3();

        try {
          $image3->move(
            $this->getParameter('kernel.project_dir') . '/public/uploads/galerie',
            $newFilename
          );
        } catch (FileException $e) {
          $this->addFlash('error', $e->getMessage());
        }

        $galery->setImage3($newFilename);
      }

      $galeryRepository->add($galery);
      $entityManager->flush();

      return $this->redirectToRoute('app_galery_index', [], Response::HTTP_SEE_OTHER);
    }

    return $this->renderForm('galery/edit.html.twig', [
      'galery' => $galery,
      'form' => $form,
    ]);
  }

  #[Route('/{id}', name: 'app_galery_delete', methods: ['POST'])]
  public function delete(Request $request, Galery $galery, EntityManagerInterface $entityManager): Response
  {
    if ($this->isCsrfTokenValid('delete' . $galery->getId(), $request->request->get('_token'))) {
      $filename1 = $galery->getImage1();
      $filename2 = $galery->getImage2();
      $filename3 = $galery->getImage3();
      $entityManager->remove($galery);
      $entityManager->flush();

      $fs = new Filesystem();
      $fs->remove($this->getParameter('kernel.project_dir') . '/public/uploads/galerie/' . $filename1);
      $fs->remove($this->getParameter('kernel.project_dir') . '/public/uploads/galerie/' . $filename2);
      $fs->remove($this->getParameter('kernel.project_dir') . '/public/uploads/galerie/' . $filename3);
    }

    return $this->redirectToRoute('app_galery_index', [], Response::HTTP_SEE_OTHER);
  }
}
