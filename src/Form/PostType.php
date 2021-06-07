<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('message', null, [
                'constraints' => [
                    new NotBlank([
                        'message' => 'wth this card is ? philosophy ? write something ?',
                    ]),
                    new Length([
                        'min' => 10,
                        'minMessage' => 'Try to wrote at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 800,
                    ]),
                ]
            ])
            ->add('Author');
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
