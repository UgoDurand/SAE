<?php

namespace App\Controller;

use App\Entity\NameBasics;
use App\Entity\TitleBasic;
use App\Entity\TitleCrew;
use App\Repository\NameBasicsRepository;
use App\Repository\TitleBasicRepository;
use App\Repository\TitleCrewRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    /**
     * @Route("/index", name="app_index")
     */
    public function index(TitleBasicRepository $titleBasicRepository, NameBasicsRepository $nameBasicsRepository): Response
    {
        $themes=[];
        $titres=$titleBasicRepository->findAll();
        foreach ($titres as $titre){
            $genres=$titre->getGenres();
            foreach ($genres as $genre) {
                if (!(in_array($genre, $themes))) {
                    $themes[] = $genre;
                }
            }
        }
        sort($themes);
        $lettres="abcdefghijklmnopqrstuvwxyz";
        return $this->render('index/index.html.twig', [
            'genres'=>$themes,
            "films"=>$titres,
            "lettres"=>["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"]
        ]);
    }

    /**
     * @Route("/indexActeur", name="app_index_acteur")
     */
    public function index_acteur(TitleBasicRepository $titleBasicRepository, NameBasicsRepository $nameBasicsRepository): Response
    {
        $themes=[];
        $acteurs=$nameBasicsRepository->findAll();
        $titres=$titleBasicRepository->findAll();
        foreach ($titres as $titre){
            $genres=$titre->getGenres();
            foreach ($genres as $genre) {
                if (!(in_array($genre, $themes))) {
                    $themes[] = $genre;
                }
            }
        }
        sort($themes);
        $lettres="abcdefghijklmnopqrstuvwxyz";
        return $this->render('index/indexPersonne.html.twig', [
            'genres'=>$themes,
            "acteurs"=>$acteurs,
            "lettres"=>["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z"]
        ]);
    }

    /**
     * @Route("/fiche/{id}", name="app_fiche")
     */
    public function fiche(TitleBasicRepository $titleBasicRepository, TitleBasic $film): Response
    {
        $themes=[];
        $titres=$titleBasicRepository->findAll();
        foreach ($titres as $titre){
            $genres=$titre->getGenres();
            foreach ($genres as $genre) {
                if (!(in_array($genre, $themes))) {
                    $themes[] = $genre;
                }
            }
        }
        sort($themes);



        return $this->render('index/fiche.html.twig', [
            'film' => $film,
            'genres'=>$themes,
        ]);
    }

    /**
     * @Route("/fiche/personne/{id}", name="app_fiche_personne")
     */
    public function fiche_personne(TitleBasicRepository $titleBasicRepository, NameBasics $personne, TitleCrewRepository $titleCrewRepository): Response
    {
        $themes=[];
        $titres=$titleBasicRepository->findAll();
        foreach ($titres as $titre){
            $genres=$titre->getGenres();
            foreach ($genres as $genre) {
                if (!(in_array($genre, $themes))) {
                    $themes[] = $genre;
                }
            }
        }
        sort($themes);

        $crews=$titleCrewRepository->findAll();
        $titles=[];
        foreach ($crews as $crew ){
            foreach ($crew->getDirectors() as $director){
                if ($director->getId()==$personne->getId()){
                    $titles[]=$crew->getTitle();
                }
            }
        }




        return $this->render('index/fichePersonne.html.twig', [
            'genres'=>$themes,
            'personne'=>$personne,
            'titres'=>$titles
        ]);
    }

    /**
     * @Route("/genre/{unGenre}", name="app_genre")
     */
    public function genre(TitleBasicRepository $titleBasicRepository,$unGenre, TitleCrewRepository $titleCrewRepository): Response
    {
        $themes=[];
        $oeuvres=[];
        $titres=$titleBasicRepository->findAll();
        foreach ($titres as $titre){
            $genres=$titre->getGenres();
            if (in_array($unGenre, $genres)){
                $oeuvres[]=$titre;
            }
            foreach ($genres as $genre) {
                if (!(in_array($genre, $themes))) {
                    $themes[] = $genre;
                }
            }
        }
        sort($themes);







        return $this->render('index/genre.html.twig', [
            'genres'=>$themes,
            'films'=>$oeuvres,
            'genre'=>$unGenre
        ]);
    }

}
