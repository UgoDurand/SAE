<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\TitleBasicRepository;
use App\Repository\TitleRatingsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    /**
     * @Route("/contact", name="app_contact")
     */
    public function index(Request $request, EntityManagerInterface $manager,TitleRatingsRepository $ratingsRepository, MailerInterface $mailer, TitleBasicRepository $titleBasicRepository): Response
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


        $contact=new Contact();
        if($this->getUser()){
            $contact->setFullName($this->getUser()->getNom() . " " . $this->getUser()->getPrenom());
            $contact->setEmail($this->getUser()->getEmail());
        }
        $form=$this->createForm(ContactType::class, $contact);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $contact=$form->getData();
            $manager->persist($contact);
            $manager->flush();
            $email = (new Email())
            ->from($contact->getEmail())
                ->to('opemovieservice@gmail.com')
                ->subject($contact->getSujet())
                ->text($contact->getMessage());

            return $this->render('menu/menu.html.twig', [
                "form"=>$form->createView(),
                "genres"=>$themes,
                "films"=>$titres,
                "notes"=>$notes,
            ]);
        }

        return $this->render('contact/index.html.twig', [
            "form"=>$form->createView(),
            "genres"=>$themes
        ]);
    }
}
