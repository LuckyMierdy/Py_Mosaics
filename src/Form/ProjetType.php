<?php

namespace App\Form;

use App\Entity\Projet;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProjetType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    $builder
      ->add('title', TextType::class)
      ->add('description', TextareaType::class, [
        'attr' => ['class' => 'description_size'],
      ])
      ->add('image', FileType::class, [
        'mapped' => false,
        'attr' => ['class' => 'upload_field'],
        'constraints' => [
          new File([
            'maxSize' => '4096k',
            'mimeTypes' => [
              'image/png',
              'image/jpg',
              'image/jpeg',
            ],
            'mimeTypesMessage' => 'Il faut mettre une image valide (png, jpg, jpeg)'
          ])
        ]
      ])
      ->add('image2', FileType::class, [
        'mapped' => false,
        'attr' => ['class' => 'form-control'],
        'constraints' => [
          new File([
            'maxSize' => '4096k',
            'mimeTypes' => [
              'image/png',
              'image/jpg',
              'image/jpeg',
            ],
            'mimeTypesMessage' => 'Il faut mettre une image valide (png, jpg, jpeg)'
          ])
        ]
      ])
      ->add('image3', FileType::class, [
        'mapped' => false,
        'attr' => ['class' => 'form-control'],
        'constraints' => [
          new File([
            'maxSize' => '4096k',
            'mimeTypes' => [
              'image/png',
              'image/jpg',
              'image/jpeg',
            ],
            'mimeTypesMessage' => 'Il faut mettre une image valide (png, jpg, jpeg)'
          ])
        ]
      ])
      ->add('image4', FileType::class, [
        'mapped' => false,
        'attr' => ['class' => 'form-control'],
        'constraints' => [
          new File([
            'maxSize' => '4096k',
            'mimeTypes' => [
              'image/png',
              'image/jpg',
              'image/jpeg',
            ],
            'mimeTypesMessage' => 'Il faut mettre une image valide (png, jpg, jpeg)'
          ])
        ]
      ])
      ->add('description2', TextareaType::class, [
        'attr' => ['class' => 'description_size'],
      ])
      ->add('image5', FileType::class, [
        'mapped' => false,
        'attr' => ['class' => 'form-control'],
        'constraints' => [
          new File([
            'maxSize' => '4096k',
            'mimeTypes' => [
              'image/png',
              'image/jpg',
              'image/jpeg',
            ],
            'mimeTypesMessage' => 'Il faut mettre une image valide (png, jpg, jpeg)'
          ])
        ]
      ])
      ->add('image6', FileType::class, [
        'mapped' => false,
        'attr' => ['class' => 'form-control'],
        'constraints' => [
          new File([
            'maxSize' => '4096k',
            'mimeTypes' => [
              'image/png',
              'image/jpg',
              'image/jpeg',
            ],
            'mimeTypesMessage' => 'Il faut mettre une image valide (png, jpg, jpeg)'
          ])
        ]
      ])
      ->add('image7', FileType::class, [
        'mapped' => false,
        'attr' => ['class' => 'form-control'],
        'constraints' => [
          new File([
            'maxSize' => '4096k',
            'mimeTypes' => [
              'image/png',
              'image/jpg',
              'image/jpeg',
            ],
            'mimeTypesMessage' => 'Il faut mettre une image valide (png, jpg, jpeg)'
          ])
        ]
      ]);
  }

  public function configureOptions(OptionsResolver $resolver): void
  {
    $resolver->setDefaults([
      'data_class' => Projet::class,
    ]);
  }
}
