<?php

namespace EV\PlatformBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class AdvertEditType extends AbstractType
{
    /**
     * Create form to edit Advert (removing the field date).
     *
     * See the form AdvertType + entity Advert
     *
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->remove('date');
    }

    /**
     * @return string
     */
    public function getParent()
    {
        return AdvertType::class;
    }
}

