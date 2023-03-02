<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\Equipe;
use App\Entity\User;
use App\Form\ContactType;
use App\Form\EquipeType;
use App\Form\RegistrationFormType;
use App\Repository\EquipeRepository;
use App\Repository\TitleBasicRepository;
use App\Security\LoginAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class EquipeController extends AbstractController
{
    /**
     * @Route("/equipe", name="app_equipe")
     */
    public function index(EquipeRepository $equipeRepository, TitleBasicRepository $titleBasicRepository): Response
    {
        $equipe = $equipeRepository->findAll();

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

        return $this->render('equipe/index.html.twig', [
            'controller_name' => 'EquipeController',
            'equipe'=>$equipe,
            "genres"=>$themes
        ]);
    }

    /**
     * @Route("/new", name="app_new_equipe")
     */
    public function new(Request $request,EquipeRepository $equipeRepository, EntityManagerInterface $manager, TitleBasicRepository $titleBasicRepository): Response
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
        $equipe = new Equipe();
        $form = $this->createForm(EquipeType::class, $equipe);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $equipe = $form->getData();
            $manager->persist($equipe);
            $manager->flush();
            return $this->redirectToRoute('app_equipe');
        }
        return $this->render('equipe/new.html.twig', [
            'equipeForm' => $form->createView(),
            "genres"=>$themes
        ]);
    }
}
