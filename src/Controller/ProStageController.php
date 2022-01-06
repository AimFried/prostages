<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\STAGE;
use App\Entity\ENTREPRISE;
use App\Entity\FORMATION;

class ProStageController extends AbstractController
{
    /**
     * @Route("/", name="bienvenu")
     */
    public function index(): Response
    {
        $repositoryStage=$this->getDoctrine()->getRepository(Stage::class);

        $stages=$repositoryStage->findAll();

        return $this->render('pro_stage/accueil.html.twig', ['listeStages' =>$stages,
        ]);
    }

    /**
     * @Route("/entreprises", name="entreprises")
     */
    public function entreprises(): Response
    {
        $repositoryEntreprise=$this->getDoctrine()->getRepository(Entreprise::class);

        $entreprises=$repositoryEntreprise->findAll();

        return $this->render('pro_stage/entreprises.html.twig', ['listeEntreprise'=>$entreprises,
        ]);
    }

    /**
     * @Route("/formations", name="formations")
     */
    public function formations(): Response
    {
        $repositoryFormation=$this->getDoctrine()->getRepository(Formation::class);

        
        $formations=$repositoryFormations->findAll();

        return $this->render('pro_stage/formations.html.twig', ['listeFormations'=>$formations,
        ]);
    }

    /**
     * @Route("/stages/{id}", name="stages")
     */
    public function stage($id): Response
    {
        $repositoryStage=$this->getDoctrine()->getRepository(Stage::class);

        $stages=$repositoryStage->findAll();

        return $this->render('pro_stage/stages.html.twig',['id_stage'=>$id]);
    }
}
