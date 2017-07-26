<?php

namespace EV\PlatformBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Table(name="application")
 * @ORM\Entity(repositoryClass="EV\PlatformBundle\Repository\ApplicationRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Application
{
    /**
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="last_name", type="string", length=255)
     * @Assert\Length(min="2", max="255")
     * @Assert\NotBlank()
     */
    private $last_name;

    /**
     * @ORM\Column(name="first_name", type="string", length=255)
     * @Assert\Length(min="2", max="255")
     * @Assert\NotBlank()
     */
    private $first_name;

    /**
     * @ORM\Column(name="content", type="text")
     * @Assert\NotBlank()
     */
    private $content;

    /**
     * @ORM\Column(name="date", type="datetime")
     * @Assert\DateTime()
     * @Assert\NotBlank()
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="EV\PlatformBundle\Entity\Advert", inversedBy="applications")
     * @ORM\JoinColumn(nullable=true)
     */
    private $advert;

    /**
     * @ORM\ManyToOne(targetEntity="EV\UserBundle\Entity\User", inversedBy="applications")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

//    /**
//     * @ORM\Column(type="string")
//     * @Assert\Ip()
//     */
//    private $ip;






    /**
     * Application constructor.
     */
    public function __construct()
    {
        $this->date = new \Datetime();
    }


    /**
     * @ORM\PostPersist()
     */
    public function increase(){
        if ($this->getAdvert() !== null) {
            $this->getAdvert()->increaseApplication();
        }
    }

    /**
     * @ORM\PreRemove()
     */
    public function decrease() {
        $this->getAdvert()->decreaseApplication();
    }



    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @param $last_name
     * @return $this
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }


    /**
     * @param $first_name
     * @return $this
     */
    public function setFirstName($first_name)
    {
        $this->first_name = $first_name;

        return $this;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->first_name;
    }


    /**
     * @param $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }


    /**
     * @param \Datetime $date
     * @return $this
     */
    public function setDate(\Datetime $date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return \Datetime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $advert
     */
    public function setAdvert($advert)
    {
        $this->advert = $advert;
    }

    /**
     * @return mixed
     */
    public function getAdvert()
    {
        return $this->advert;
    }


    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

//    /**
//     * @return mixed
//     */
//    public function getIp()
//    {
//        return $this->ip;
//    }
//
//    /**
//     * @param mixed $ip
//     */
//    public function setIp($ip)
//    {
//        $this->ip = $ip;
//    }

}