<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GreController extends AbstractController
{
    #[Route('/gre', name: 'gre')]
    public function index(): Response
    {
        return $this->render('gre/listeCv.html.twig', [
            'controller_name' => 'GreController',
        ]);
    }

    #[Route('/', name: 'accueil')]
    public function accueil(): Response
    {
        return $this->render('gre/accueil.html.twig');
    }

    #[Route('/connexion', name: 'connexion')]
    public function login(): Response
    {
        return $this->render('gre/login.html.twig');
    }

    #[Route('/deconnexion', name: 'deconnexion')]
    public function deconnexion(): Response{}

    #[Route('/accueilDemandeur', name: 'accueil_demandeur')]
    public function accueilDemandeur(): Response
    {
        return $this->render('gre/accueilDemandeur.html.twig');
    }

}
