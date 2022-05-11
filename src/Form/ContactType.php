<?php

namespace App\Form;

use App\Entity\Message;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
  public function buildForm(FormBuilderInterface $builder, array $options): void
  {
    $builder
      ->add('username', TextType::class, [
        'attr' => ['class' => 'contact_user_email']
      ])
      ->add('email', TextType::class, [
        'attr' => ['class' => 'contact_user_email']
      ])
      ->add('subject', TextType::class, [
        'attr' => ['class' => 'contact_subject']
      ])
      ->add('message', TextareaType::class, [
        'attr' => ['class' => 'contact_message']
      ]);
  }

  public function configureOptions(OptionsResolver $resolver): void
  {
    $resolver->setDefaults([
      'data_class' => Message::class,
    ]);
  }
}
