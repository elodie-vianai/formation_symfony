<?php

namespace EV\PlatformBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Antiflood extends Constraint
{
    public $message = "Vous avez déjà posté un message il y a moins de 15 secondes, merci d'attendre un peu.";


    /**
     * Ask to be validated by the alias service
     * @return string
     */
    public function validatedBy()
    {
//        return 'ev_platform_antiflood'; //appel à l'alias du service
    }
}