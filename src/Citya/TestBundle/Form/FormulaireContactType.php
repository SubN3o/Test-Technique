<?php
/**
 * Created by PhpStorm.
 * User: jeremie
 * Date: 13/02/18
 * Time: 09:33
 */

namespace Citya\TestBundle\Form;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormulaireContactType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface$builder, array $options)
    {
        $builder
            ->add('typologie',  ChoiceType::class,[
                'choices'=>[
                    'Demande d\'information'=>'Demande d\'information',
                    'Problème de facturation'=>'Problème de facturation',
                    'Autre problème'=>'Autre problème'
                ],
                'multiple'=>false,
                'expanded'=>false,
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('nom',        TextType::class,[
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('prenom',     TextType::class,[
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('portable',   TextType::class,[
                'label'=>'N° de portable',
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('mail',       EmailType::class,[
                'label'=>'E-mail',
                'attr'=>[
                    'class'=>'form-control'
                ]
            ])
            ->add('message',    TextareaType::class,[
                'attr'=>[
                    'placeholder'=>'Votre message',
                    'class'=>'form-control'
                ]
            ])
            ->add('envoyer',    SubmitType::class)
        ;
    }/**
 * {@inheritdoc}
 */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Citya\TestBundle\Entity\Contact'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'citya_testbundle_contact';
    }
}