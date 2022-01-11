<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\STAGE; //Fichier associé à la table Stage
use App\Entity\ENTREPRISE; //Fichier associé à la table Entreprise
use App\Entity\FORMATION; //Fichier associé à la table Formation

class ProStageController extends AbstractController
{
    /**
     * @Route("/", name="accueil")
     */
    public function index(): Response
    {
        //Création d'un repository pointant vers la classe "Stage"
        $repositoryStage=$this->getDoctrine()->getRepository(Stage::class);
        //Récupération des attributs de la classe "Stage"
        $stages=$repositoryStage->findAll();

        //Envoi de l'entitée stage vers la template
        return $this->render('pro_stage/accueil.html.twig', ['stages' =>$stages,]);
    }

    /**
     * @Route("/entreprises", name="affichageEntreprises")
     */
    public function affichageEntreprises(): Response
    {
        //Création d'un repository pointant vers la classe "Entreprise"
        $repositoryEntreprise=$this->getDoctrine()->getRepository(Entreprise::class);
        //Récupération des attributs de la classe "Entreprise"
        $entreprises=$repositoryEntreprise->findAll();

        //Envoi de l'entitée stage vers la template
        return $this->render('pro_stage/affichageEntreprises.html.twig', ['entreprises'=>$entreprises,]);
    }

    /**
     * @Route("/entreprises/{id}", name="affichageStageParEntreprise")
     */
    public function affichageStageParEntreprise($id): Response
    {
        ///ENTREPRISE
        //Création d'un repository pointant vers la classe "Entreprise"
        $repositoryEntreprise=$this->getDoctrine()->getRepository(Entreprise::class);
        //Récupération des attributs de la classe "Entreprise" correspondant à $id
        $entreprise=$repositoryEntreprise->find($id);

        ///STAGE
        //Création d'un repository pointant vers la classe "Stage"
        $repositoryStage=$this->getDoctrine()->getRepository(Stage::class);
        //Récupération des attributs de la classe "Stage"
        $stage=$repositoryStage->findAll();

        //Envoi des entitées stage vers la template
        return $this->render('pro_stage/affichageStageParEntreprise.html.twig', ['entreprise'=>$entreprise,'stage' =>$stage,]);
    }


    /**
     * @Route("/formations", name="affichageFormations")
     */
    public function affichageFormations(): Response
    {
        //Création d'un repository pointant vers la classe "Formation"
        $repositoryFormation=$this->getDoctrine()->getRepository(Formation::class);
        //Récupération des attributs de la classe "Formation"        
        $formations=$repositoryFormation->findAll();

        //Envoi de l'entitée stage vers la template
        return $this->render('pro_stage/affichageFormations.html.twig', ['formations'=>$formations,]);
    }

    /**
     * @Route("/formations/{id}", name="affichageStageParFormation")
     */
    public function affichageStageParFormations($id): Response
    {
        //Création d'un repository pointant vers la classe "Formation"
        $repositoryFormation=$this->getDoctrine()->getRepository(Formation::class);
        //Récupération des attributs de la classe "Formation" correspondant à $id
        $formation=$repositoryFormation->find($id);

        //Envoi de l'entité stage vers la template
        return $this->render('pro_stage/affichageStageParFormation.html.twig', ['formation'=>$formation,]);
    }

    /**
     * @Route("/stages/{id}", name="affichageStage")
     */
    public function affichageStage($id): Response
    {
        //Création d'un repository pointant vers la classe "Stage"
        $repositoryStage=$this->getDoctrine()->getRepository(Stage::class);
        //Récupération des attributs de la classe "Stage" correspondant à $id
        $stage=$repositoryStage->find($id);
        
        //Envoi de l'entité stage vers la template
        return $this->render('pro_stage/affichageStages.html.twig',['stage'=>$stage]);
    }
}
