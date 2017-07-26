<?php

namespace EV\PlatformBundle\Form;

use EV\PlatformBundle\Repository\CategoryRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
// gestion des events
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class AdvertType extends AbstractType
{
    /**
     * Create the advert form
     *
     * See entity Advert (+ entities Image and Category) + AdvertController
     *
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',          TextType::class)
            ->add('description',    TextareaType::class)
            ->add('profile',        TextareaType::class)
            ->add('details',        TextareaType::class)
            ->add('image',          ImageType::class)
            ->add('categories',     EntityType::class, array(
                'class'         => 'EVPlatformBundle:Category',
                'choice_label'  => 'name',
                'multiple'      => true,
            ))
            ->add('save',           SubmitType::class)
            ->getForm();

        // Fonction écoutant un événement
        $builder->addEventListener(
        //1e argument : événement PRE_SET_DATA
            FormEvents::PRE_SET_DATA,
            //2e argument : fonction à exécuter lorsque l'événement est déclenché
            function (FormEvent $event) {
                $advert = $event->getData();    // récupération de l'objet Advert sous-jacent
                // condition importante !!!!
                if (null === $advert) {
                    return;                     // Sortie de la fonction sans rien faire si $advert est null
                }
                // Si l'annonce n'est pas publiée, ou si elle n'existe pas encore en bdd (id null)
                if (!$advert->getPublished() || null === $advert->getId()) {
                    // alors le champ published est ajouté
                    $event->getForm()->add('published', CheckboxType::class, array('required' => false));
                } else {
                    //sinon on supprime l'annonce
                    $event->getForm()->remove('published');
                }
            }
        );
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EV\PlatformBundle\Entity\Advert'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'ev_platformbundle_advert';
    }


}
