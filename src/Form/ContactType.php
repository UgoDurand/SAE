<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('FullName', TextType::class,[
                'attr'=>['btn btn-primary mt-4',
                    'placeholder'=> 'Nom'
                ],
            ])
            ->add('email', EmailType::class)
            ->add('Sujet', TextType::class)
            ->add('Message', TextareaType::class)
            ->add('submit', SubmitType::class,[
                'attr'=>['btn btn-primary mt-4'
                    ],
                'label'=> 'Soumettre le formulaire'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
