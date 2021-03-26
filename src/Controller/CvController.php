<?php

namespace App\Controller;

use App\Entity\Cv;
use App\Form\CvType;
use App\Repository\CvRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

#[Route('/cv')]
class CvController extends AbstractController
{
    #[Route('/', name: 'cv_index', methods: ['GET'])]
    public function index(CvRepository $cvRepository): Response
    {
        return $this->render('cv/listeCv.html.twig', [
            'cvs' => $cvRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'cv_new', methods: ['GET', 'POST'])]
    public function new(Request $request,UserPasswordEncoderInterface $encoders): Response
    {
        $cv = new Cv();
        $form = $this->createForm(CvType::class, $cv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $hash = $encoders->encodePassword($cv,$cv->getPassword());
            $cv->setPassword($hash);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($cv);
            $entityManager->flush();

            return $this->redirectToRoute('cv_show', ['id' => $cv->getId() ]);
        }

        return $this->render('cv/inscription.html.twig', [
            'cv' => $cv,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'cv_show', methods: ['GET'])]
    public function show(Cv $cv): Response
    {
        return $this->render('cv/accueilCv.html.twig', [
            'cv' => $cv,
        ]);
    }

    #[Route('/{id}/edit', name: 'cv_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Cv $cv): Response
    {
        $form = $this->createForm(CvType::class, $cv);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cv_index');
        }

        return $this->render('cv/modifierCv.html.twig', [
            'cv' => $cv,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/{id}', name: 'cv_delete', methods: ['POST'])]
    public function delete(Request $request, Cv $cv): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cv->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cv);
            $entityManager->flush();
        }

        return $this->redirectToRoute('cv_index');
    }



}
