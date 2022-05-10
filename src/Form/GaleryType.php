<?php

namespace App\Form;

use App\Entity\Galery;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GaleryType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    $builder
      ->add('title', TextType::class)
      ->add('image1', FileType::class, [
        'mapped' => false,
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
      'data_class' => Galery::class,
    ]);
  }
}
