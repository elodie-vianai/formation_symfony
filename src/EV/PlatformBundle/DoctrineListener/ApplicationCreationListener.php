<?php

namespace EV\PlatformBundle\DoctrineListener;


use Doctrine\Common\Persistence\Event\LifecycleEventArgs;
use EV\PlatformBundle\Email\ApplicationMailer;
use EV\PlatformBundle\Entity\Application;

class ApplicationCreationListener
{
    /**
     * @var ApplicationMailer
     */
    private $applicationMailer;


    /**
     * ApplicationCreationListener constructor.
     * @param ApplicationMailer $applicationMailer
     */
    public function __construct(ApplicationMailer $applicationMailer)
    {
        $this->applicationMailer = $applicationMailer;
    }


    public function postPersist(LifecycleEventArgs $args){
        $entity = $args->getObject();

        // Envoi du mail que pour les entités Applications donc si $entity n'est pas une instace d'Application
        if (!$entity instanceof Application) {
            // on ne fait rien et on sort de la méthode (= return;)
            return;
        }

        $this->applicationMailer->sendNewNotification($entity);
    }
}