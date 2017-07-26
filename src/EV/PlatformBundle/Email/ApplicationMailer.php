<?php

namespace EV\PlatformBundle\Email;

use EV\PlatformBundle\Entity\Application;


class ApplicationMailer
{
    /**
     * @var \Swift_Mailer
     */
    private $mailer;


    /**
     * ApplicationMailer constructor.
     * @param \Swift_Mailer $mailer
     */
    public function __construct(\Swift_Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function sendNewNotification(Application $application)
    {
//        $message = new \Swift_Message(
//            'Nouvelle candidature',
//            'Vous avez reçu une nouvelle candidature.'
//        );
//
//        if ($application->getAdvert() !== null) {
//            $message
//                ->addTo($application->getAdvert()->getAuthor())
//                ->addFrom('admin@votresite.com');
//
//            $this->mailer->send($message);
//        }
    }
}