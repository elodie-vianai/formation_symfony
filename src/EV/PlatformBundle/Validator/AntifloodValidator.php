<?php

namespace EV\PlatformBundle\Validator;

use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class AntifloodValidator extends ConstraintValidator
{
    private $requestStack;
    private $em;


    /**
     * AntifloodValidator constructor.
     *
     * Les argument déclarés dans la définition du service arrivent au constructeur donc on doit les enregistrer
     * dans l'objet pour pouvoir s'en servir dans la méthode validate()
     *
     * @param RequestStack $requestStack
     * @param EntityManager $em
//     */
//    public function __construct(RequestStack $requestStack, EntityManager $em)
//    {
//        $this->requestStack = $requestStack;
//        $this->em = $em;
//    }


//    /**
//     * Validate or not the value of an attribute. Return a violation if the value is invalid.
//     *
//     * @param mixed $value
//     * @param Constraint $constraint
//     */
//    public function validate($value, Constraint $constraint)
//    {
//        // Récupération de l'objet Request en utilisant getCurrentRequest du service request_stack
//        $request = $this->requestStack->getCurrentRequest();
//
//        // Récupération de l'IP de celui qui poste
//        $ip = $request->getClientIp();
//
//        // Vérification de si cette IP a déjà posté une candidature il y a moins de 15 secondes
////        $isFlood = $this->em
////            ->getRepository('EVPlatformBundle:Application')
////            ->isFlood($ip, 15);      //méthode à créer
//
//        if ($isFlood) {
//            // Cette ligne déclenche l'erreur pour le formulaire, avec en argument le message de la contrainte
//            $this->context->addViolation($constraint->message);
//        }
//    }
}