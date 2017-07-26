<?php

namespace EV\UserBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Criteria;
use Doctrine\ORM\Mapping as ORM;
use EV\PlatformBundle\Entity\Advert;
use EV\PlatformBundle\Entity\Application;
use FOS\UserBundle\Model\User as BaseUser;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="EV\UserBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="EV\PlatformBundle\Entity\Application", mappedBy="user", cascade={"persist"})
     *
     */
    private $applications;

    /**
     * @ORM\OneToMany(targetEntity="EV\PlatformBundle\Entity\Advert", mappedBy="user", cascade={"persist"})
     *
     */
    private $adverts;


    public function __construct()
    {
        parent::__construct();
        $this->applications = new ArrayCollection();
        $this->adverts = new ArrayCollection();

    }



    /**
     * Link an application to a user
     *
     * @param \EV\PlatformBundle\Entity\Application $application
     *
     * @return User
     */
    public function addApplication(Application $application)
    {
        $this->applications[] = $application;

        // Link the advert to the application
        $application->setUser($this);

        return $this;
    }

    /**
     * Remove application
     *
     * @param \EV\PlatformBundle\Entity\Application $application
     */
    public function removeApplication(Application $application)
    {
        $this->applications->removeElement($application);
    }

    /**
     * Get applications
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getApplications()
    {
        return $this->applications;
    }

    public function getSortedApplication()
    {
        $sort = Criteria::create();
        $sort->orderBy(Array(
            'date' => Criteria::DESC
        ));
        return $this->applications->matching($sort);

    }



    /**
     * Link an advert to a user
     *
     * @param \EV\PlatformBundle\Entity\Advert $advert
     *
     * @return User
     */
    public function addAdvert(Advert $advert)
    {
        $this->adverts[] = $advert;

        // Link the advert to the application
        $advert->setUser($this);

        return $this;
    }

    /**
     * Remove advert
     *
     * @param \EV\PlatformBundle\Entity\Advert $advert
     */
    public function removeAdvert(Advert $advert)
    {
        $this->adverts->removeElement($advert);
    }

    /**
     * Get adverts
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAdverts()
    {
        return $this->adverts;
    }

    public function getSortedAdverts()
    {
        $sort = Criteria::create();
        $sort->orderBy(Array(
            'date' => Criteria::DESC
        ));
        return $this->adverts->matching($sort);

    }
}

