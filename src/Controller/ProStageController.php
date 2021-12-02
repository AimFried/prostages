<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProStageController extends AbstractController
{
    /**
     * @Route("/", name="bienvenu")
     */
    public function index(): Response
    {
        return $this->render('pro_stage/index.html.twig', [
            'controller_name' => 'Bienvenue sur la page d\'accueil de Prostages',
        ]);
    }

    /**
     * @Route("/entreprises", name="entreprises")
     */
    public function entreprises(): Response
    {
        return $this->render('pro_stage/index.html.twig', [
            'controller_name' => 'Cette page affichera la liste des entreprises proposant un stage ',
        ]);
    }

    /**
     * @Route("/formations", name="formations")
     */
    public function formations(): Response
    {
        return $this->render('pro_stage/index.html.twig', [
            'controller_name' => 'Cette page affichera la liste des formations de l\'IUT',
        ]);
    }

    /**
     * @Route("/stages/", name="stages")
     */
    public function stage(): Response
    {
        return $this->render('pro_stage/index.html.twig', [
            'controller_name' => 'Cette page affichera le descriptif du stage ayant pour identifiant',
        ]);
    }
}
