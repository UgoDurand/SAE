<?php

namespace App\Controller;

use App\Repository\TitleBasicRepository;
use App\Repository\TitleRatingsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MenuController extends AbstractController
{
    /**
     * @Route("/menu", name="menu")
     */
    public function menu(TitleBasicRepository $titleBasicRepository, TitleRatingsRepository $ratingsRepository):Response
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


        $notes=$ratingsRepository->findBy([],['averageRating'=>'DESC']);
        return $this->render("menu/menu.html.twig",[
            "films"=>$titleBasicRepository->findBy([],['id'=>'DESC']),
            "notes"=>$notes,
            "genres"=>$themes
        ]);
    }
}
