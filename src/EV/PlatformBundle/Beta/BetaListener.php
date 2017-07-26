<?php

namespace EV\PlatformBundle\Beta;

use Symfony\Component\HttpKernel\Event\FilterResponseEvent;


class BetaListener
{
    protected $betaHTML;                         // notre processeur
    protected $endDate;                         // date de la fin de la version bêta

    function __construct(BetaHTMLAdder $betaHTML, $endDate)
    {
        $this->betaHTML     = $betaHTML;
        $this->endDate      = new \DateTime($endDate);
    }

    // L'argument de la méthode est un FilterResponseEvent
    public function processBeta(FilterResponseEvent $event){
        if (!$event->isMasterRequest()){
            return;
        }

        $remainingDays  =   $this->endDate->diff(new \DateTime())->days;

        // Si la date est dépassée, on ne fait rien
        if ($remainingDays <= 0){
            return;
        }

        // Utilisation du BetaHTML
        $response   =   $this->betaHTML->addBeta($event->getResponse(), $remainingDays);

        // Puis insertion de la réponse modifiée dans l'évènement
        $event->setResponse($response);
    }


}