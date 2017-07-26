<?php

namespace EV\PlatformBundle\Antispam;

class EVAntispam
{
    private $mailer;
    private $locale;
    private $minLength;


    /**
     * EVAntispam constructor.
     * @param \Swift_Mailer $mailer
     * @param $locale
     * @param $minLenght
     */
    public function __construct(\Swift_Mailer $mailer, $locale, $minLenght)
    {
        $this->mailer       = $mailer;
        $this->locale       = $locale;
        $this->minLength    = $minLenght;
    }


    /**
     * @param $text
     * @return bool
     */
    public function isSpam($text)
    {
        return strlen($text) < $this->minLength;
    }

}