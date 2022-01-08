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
     * @Route("/", name="accueil")
     */
    public function index(): Response
    {
        $repositoryStage=$this->getDoctrine()->getRepository(Stage::class);
        //Récupération de toutes les entitées de la table
        $stages=$repositoryStage->findAll();

        return $this->render('pro_stage/accueil.html.twig', ['stages' =>$stages,
        ]);
    }

    /**
     * @Route("/entreprises", name="affichageEntreprises")
     */
    public function affichageEntreprises(): Response
    {
        $repositoryEntreprise=$this->getDoctrine()->getRepository(Entreprise::class);

        $entreprises=$repositoryEntreprise->findAll();

        return $this->render('pro_stage/affichageEntreprises.html.twig', ['entreprises'=>$entreprises,
        ]);
    }

    /**
     * @Route("/entreprises/{id}", name="affichageStageParEntreprise")
     */
    public function affichageStageParEntreprise($id): Response
    {
        $repositoryEntreprise=$this->getDoctrine()->getRepository(Entreprise::class);
        
        $entreprise=$repositoryEntreprise->find($id);

        $repositoryStage=$this->getDoctrine()->getRepository(Stage::class);
        //Récupération de toutes les entitées de la table
        $stage=$repositoryStage->findAll();

        return $this->render('pro_stage/affichageStageParEntreprise.html.twig', ['entreprise'=>$entreprise,'stage' =>$stage,
        ]);
    }


    /**
     * @Route("/formations", name="affichageFormations")
     */
    public function affichageFormations(): Response
    {
        $repositoryFormation=$this->getDoctrine()->getRepository(Formation::class);

        
        $formations=$repositoryFormation->findAll();

        return $this->render('pro_stage/affichageFormations.html.twig', ['formations'=>$formations,
        ]);
    }

    /**
     * @Route("/formations/{id}", name="affichageStageParFormation")
     */
    public function affichageStageParFormations($id): Response
    {
        $repositoryFormation=$this->getDoctrine()->getRepository(Formation::class);

        
        $formation=$repositoryFormation->find($id);

        return $this->render('pro_stage/affichageStageParFormation.html.twig', ['formation'=>$formation,
        ]);
    }

    /**
     * @Route("/stages/{id}", name="affichageStage")
     */
    public function affichageStage($id): Response
    {
        $repositoryStage=$this->getDoctrine()->getRepository(Stage::class);

        $stage=$repositoryStage->find($id);

        return $this->render('pro_stage/stages.html.twig',['stage'=>$stage,
        ]);
    }
}
