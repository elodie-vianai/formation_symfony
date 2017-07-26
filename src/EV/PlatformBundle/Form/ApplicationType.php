<?php
/**
 * Created by PhpStorm.
 * User: Elodie Vianai
 * Date: 19/07/2017
 * Time: 17:46
 */

namespace EV\PlatformBundle\Form;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
// gestion des events
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ApplicationType extends AbstractType
{
    /**
     * Create the application form
     *
     * See entity Application + ApplicationController
     *
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('last_name',          TextType::class)
            ->add('first_name',         TextType::class)
            ->add('content',            TextareaType::class)
            ->add('enregistrer',        SubmitType::class)
            ->add('annuler',            ButtonType::class)
            ->getForm();
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EV\PlatformBundle\Entity\Application'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ev_platformbundle_application';
    }


}