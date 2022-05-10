<?php

namespace App\Controller;

use App\Entity\Projet;
use App\Form\ProjetType;
use App\Repository\ProjetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('gerant/projet')]
class ProjetController extends AbstractController
{
  #[Route('/', name: 'app_projet_index', methods: ['GET'])]
  public function index(ProjetRepository $projetRepository): Response
  {
    return $this->render('projet/index.html.twig', [
      'projets' => $projetRepository->findAll(),
    ]);
  }

  #[Route('/new', name: 'app_projet_new', methods: ['GET', 'POST'])]
  public function new(Request $request, ProjetRepository $projetRepository): Response
  {
    $projet = new Projet();
    $form = $this->createForm(ProjetType::class, $projet);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
      /** @var UploadedFile $image */
      $image = $form->get('image')->getData();

      if ($image) {
        $newFilename = uniqid() . '.' . $image->guessExtension();

        try {
          $image->move(
            $this->getParameter('kernel.project_dir') . '/public/uploads/projets',
            $newFilename
          );
        } catch (FileException $e) {
          $this->addFlash('error', $e->getMessage());
        }

        $projet->setImage($newFilename);
      }

      /** @var UploadedFile $image2 */
      $image2 = $form->get('image2')->getData();

      if ($image2) {
        $newFilename = uniqid() . '.' . $image2->guessExtension();

        try {
          $image2->move(
            $this->getParameter('kernel.project_dir') . '/public/uploads/projets',
            $newFilename
          );
        } catch (FileException $e) {
          $this->addFlash('error', $e->getMessage());
        }

        $projet->setImage2($newFilename);
      }

      /** @var UploadedFile $image3 */
      $image3 = $form->get('image3')->getData();

      if ($image3) {
        $newFilename = uniqid() . '.' . $image3->guessExtension();

        try {
          $image3->move(
            $this->getParameter('kernel.project_dir') . '/public/uploads/projets',
            $newFilename
          );
        } catch (FileException $e) {
          $this->addFlash('error', $e->getMessage());
        }

        $projet->setImage3($newFilename);
      }

      /** @var UploadedFile $image4 */
      $image4 = $form->get('image4')->getData();

      if ($image4) {
        $newFilename = uniqid() . '.' . $image4->guessExtension();

        try {
          $image4->move(
            $this->getParameter('kernel.project_dir') . '/public/uploads/projets',
            $newFilename
          );
        } catch (FileException $e) {
          $this->addFlash('error', $e->getMessage());
        }

        $projet->setImage4($newFilename);
      }

      /** @var UploadedFile $image5 */
      $image5 = $form->get('image5')->getData();

      if ($image5) {
        $newFilename = uniqid() . '.' . $image5->guessExtension();

        try {
          $image5->move(
            $this->getParameter('kernel.project_dir') . '/public/uploads/projets',
            $newFilename
          );
        } catch (FileException $e) {
          $this->addFlash('error', $e->getMessage());
        }

        $projet->setImage5($newFilename);
      }

      /** @var UploadedFile $image6 */
      $image6 = $form->get('image6')->getData();

      if ($image6) {
        $newFilename = uniqid() . '.' . $image6->guessExtension();

        try {
          $image6->move(
            $this->getParameter('kernel.project_dir') . '/public/uploads/projets',
            $newFilename
          );
        } catch (FileException $e) {
          $this->addFlash('error', $e->getMessage());
        }

        $projet->setImage6($newFilename);
      }

      /** @var UploadedFile $image7 */
      $image7 = $form->get('image7')->getData();

      if ($image7) {
        $newFilename = uniqid() . '.' . $image7->guessExtension();

        try {
          $image7->move(
            $this->getParameter('kernel.project_dir') . '/public/uploads/projets',
            $newFilename
          );
        } catch (FileException $e) {
          $this->addFlash('error', $e->getMessage());
        }

        $projet->setImage7($newFilename);
      }

      $projetRepository->add($projet);
      return $this->redirectToRoute('app_projet_index', [], Response::HTTP_SEE_OTHER);
    }

    return $this->renderForm('projet/new.html.twig', [
      'projet' => $projet,
      'form' => $form,
    ]);
  }

  #[Route('/{id}', name: 'app_projet_show', methods: ['GET'])]
  public function show(Projet $projet): Response
  {
    return $this->render('projet/show.html.twig', [
      'projet' => $projet,
    ]);
  }

  #[Route('/{id}/edit', name: 'app_projet_edit', methods: ['GET', 'POST'])]
  public function edit(Request $request, Projet $projet, ProjetRepository $projetRepository): Response
  {
    $form = $this->createForm(ProjetType::class, $projet);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {

      /** @var UploadedFile $image */
      $image = $form->get('image')->getData();

      if ($image) {
        $newFilename = uniqid() . '.' . $image->guessExtension();

        try {
          $image->move(
            $this->getParameter('kernel.project_dir') . '/public/uploads/projets',
            $newFilename
          );
        } catch (FileException $e) {
          $this->addFlash('error', $e->getMessage());
        }

        $projet->setImage($newFilename);
      }

      /** @var UploadedFile $image2 */
      $image2 = $form->get('image2')->getData();

      if ($image2) {
        $newFilename = uniqid() . '.' . $image2->guessExtension();

        try {
          $image2->move(
            $this->getParameter('kernel.project_dir') . '/public/uploads/projets',
            $newFilename
          );
        } catch (FileException $e) {
          $this->addFlash('error', $e->getMessage());
        }

        $projet->setImage2($newFilename);
      }

      /** @var UploadedFile $image3 */
      $image3 = $form->get('image3')->getData();

      if ($image3) {
        $newFilename = uniqid() . '.' . $image3->guessExtension();

        try {
          $image3->move(
            $this->getParameter('kernel.project_dir') . '/public/uploads/projets',
            $newFilename
          );
        } catch (FileException $e) {
          $this->addFlash('error', $e->getMessage());
        }

        $projet->setImage3($newFilename);
      }

      /** @var UploadedFile $image4 */
      $image4 = $form->get('image4')->getData();

      if ($image4) {
        $newFilename = uniqid() . '.' . $image4->guessExtension();

        try {
          $image4->move(
            $this->getParameter('kernel.project_dir') . '/public/uploads/projets',
            $newFilename
          );
        } catch (FileException $e) {
          $this->addFlash('error', $e->getMessage());
        }

        $projet->setImage4($newFilename);
      }

      /** @var UploadedFile $image5 */
      $image5 = $form->get('image5')->getData();

      if ($image5) {
        $newFilename = uniqid() . '.' . $image5->guessExtension();

        try {
          $image5->move(
            $this->getParameter('kernel.project_dir') . '/public/uploads/projets',
            $newFilename
          );
        } catch (FileException $e) {
          $this->addFlash('error', $e->getMessage());
        }

        $projet->setImage5($newFilename);
      }

      /** @var UploadedFile $image6 */
      $image6 = $form->get('image6')->getData();

      if ($image6) {
        $newFilename = uniqid() . '.' . $image6->guessExtension();

        try {
          $image6->move(
            $this->getParameter('kernel.project_dir') . '/public/uploads/projets',
            $newFilename
          );
        } catch (FileException $e) {
          $this->addFlash('error', $e->getMessage());
        }

        $projet->setImage6($newFilename);
      }

      /** @var UploadedFile $image7 */
      $image7 = $form->get('image7')->getData();

      if ($image7) {
        $newFilename = uniqid() . '.' . $image7->guessExtension();

        try {
          $image7->move(
            $this->getParameter('kernel.project_dir') . '/public/uploads/projets',
            $newFilename
          );
        } catch (FileException $e) {
          $this->addFlash('error', $e->getMessage());
        }

        $projet->setImage7($newFilename);
      }

      $projetRepository->add($projet);
      return $this->redirectToRoute('app_projet_index', [], Response::HTTP_SEE_OTHER);
    }

    return $this->renderForm('projet/edit.html.twig', [
      'projet' => $projet,
      'form' => $form,
    ]);
  }

  #[Route('/{id}', name: 'app_projet_delete', methods: ['POST'])]
  public function delete(Request $request, Projet $projet, ProjetRepository $projetRepository): Response
  {
    if ($this->isCsrfTokenValid('delete' . $projet->getId(), $request->request->get('_token'))) {
      $filename = $projet->getImage();
      $filename2 = $projet->getImage2();
      $filename3 = $projet->getImage3();
      $filename4 = $projet->getImage4();
      $filename5 = $projet->getImage5();
      $filename6 = $projet->getImage6();
      $filename7 = $projet->getImage7();
      $projetRepository->remove($projet);

      $fs = new Filesystem();
      $fs->remove($this->getParameter('kernel.project_dir') . '/public/uploads/projets' . $filename);
      $fs->remove($this->getParameter('kernel.project_dir') . '/public/uploads/projets' . $filename2);
      $fs->remove($this->getParameter('kernel.project_dir') . '/public/uploads/projets' . $filename3);
      $fs->remove($this->getParameter('kernel.project_dir') . '/public/uploads/projets' . $filename4);
      $fs->remove($this->getParameter('kernel.project_dir') . '/public/uploads/projets' . $filename5);
      $fs->remove($this->getParameter('kernel.project_dir') . '/public/uploads/projets' . $filename6);
      $fs->remove($this->getParameter('kernel.project_dir') . '/public/uploads/projets' . $filename7);
    }

    return $this->redirectToRoute('app_projet_index', [], Response::HTTP_SEE_OTHER);
  }
}
