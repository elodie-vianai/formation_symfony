<?php

namespace EV\PlatformBundle\Entity;

use EV\PlatformBundle\Validator\Antiflood;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;
use Doctrine\ORM\Mapping as ORM;


/**
 * Advert
 *
 * @ORM\Table(name="advert")
 * @ORM\Entity(repositoryClass="EV\PlatformBundle\Repository\AdvertRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Advert
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     * @Assert\DateTime()
     */
    private $date;

    /**
     * @var string
     * @Assert\Length(min=10)
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @ORM\ManyToOne(targetEntity="EV\UserBundle\Entity\User", inversedBy="adverts")
     * @ORM\JoinColumn(nullable=true)
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * @Assert\NotBlank()
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="profile", type="text", nullable=true)
     */
    private $profile;

    /**
     * @var string
     *
     * @ORM\Column(name="details", type="text", nullable=true)
     */
    private $details;

    /**
     * @var boolean
     *
     * @ORM\Column(name="published", type="boolean")
     */
    private $published = true;

    /**
     * @ORM\OneToOne(targetEntity="EV\PlatformBundle\Entity\Image", cascade={"persist", "remove"})
     * @Assert\Valid()
     */
    private $image;

    /**
     * @ORM\ManyToMany(targetEntity="EV\PlatformBundle\Entity\Category", cascade={"persist"})
     * @ORM\JoinTable(name="advert_category")
     */
    private $categories;

    /**
     * @ORM\OneToMany(targetEntity="EV\PlatformBundle\Entity\Application", mappedBy="advert", cascade={"persist"})
     * @Assert\Valid()
     */
    private $applications;

    /**
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @ORM\Column(name="nb_Applications", type="integer")
     */
    private $nbApplications = 0;

//    /**
//     * @Gedmo\Slug(fields={"title"})
//     * @ORM\Column(name="slug", type="string", length=255, unique=true)
//     */
//    private $slug;


//    /**
//     * @ORM\Column(type="string")
//     * @Assert\Ip()
//     */
//    private $ip;


    /**
     * Advert constructor.
     */
    public function __construct()
    {
        $this->date = new \Datetime();
        $this->categories = new ArrayCollection();
        $this->applications = new ArrayCollection();
    }


    /**
     * @ORM\PreUpdate
     */
    public function updateDate()
    {
        $this->setUpdatedAt(new \DateTime());
    }


    /**
     * Increase the counter of the number of applications
     */
    public function increaseApplication()
    {
        $this->nbApplications++;
    }

    /**
     * Decrease the counter of the number of applications
     */
    public function decreaseApplication()
    {
        $this->nbApplications--;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Advert
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }


    /**
     * Set title
     *
     * @param string $title
     *
     * @return Advert
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
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


    /**
     * Set description
     *
     * @param string $description
     *
     * @return Advert
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }


    /**
     * Set profile
     *
     * @param string $profile
     *
     * @return Advert
     */
    public function setProfile($profile)
    {
        $this->profile = $profile;

        return $this;
    }

    /**
     * Get profile
     *
     * @return string
     */
    public function getProfile()
    {
        return $this->profile;
    }


    /**
     * Set details
     *
     * @param string $details
     *
     * @return Advert
     */
    public function setDetails($details)
    {
        $this->details = $details;

        return $this;
    }

    /**
     * Get details
     *
     * @return string
     */
    public function getDetails()
    {
        return $this->details;
    }


    /**
     * Set if an advert is published
     *
     * @param bool $published
     *
     * @return Advert
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get if an advert is published
     *
     * @return bool
     */
    public function getPublished()
    {
        return $this->published;
    }


    /**
     * @param mixed $image
     */
    public function setImage(Image $image = null)
    {
        $this->image = $image;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }


    /**
     * Add a new category
     * @param Category $category
     */
    public function addCategory(Category $category)
    {
        // Ici, on utilise l'ArrayCollection vraiment comme un tableau
        $this->categories[] = $category;
    }

    /**
     * Remove a defined category
     *
     * @param Category $category
     */
    public function removeCategory(Category $category)
    {
        // Ici on utilise une méthode de l'ArrayCollection, pour supprimer la catégorie en argument
        $this->categories->removeElement($category);
    }

    /**
     * Get all categories
     *
     * @return ArrayCollection
     */
    public function getCategories()
    {
        return $this->categories;
    }


    /**
     * Add application
     *
     * @param \EV\PlatformBundle\Entity\Application $application
     *
     * @return Advert
     */
    public function addApplication(Application $application)
    {
        $this->applications[] = $application;

        // Link the advert to the application
        $application->setAdvert($this);

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


    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\Datetime $updatedAt = null)
    {
        $this->updatedAt = $updatedAt;
    }


    /**
     * @param $nbApplications
     */
    public function setNbApplications($nbApplications)
    {
        $this->nbApplications = $nbApplications;
    }
    /**
     * @return integer
     */
    public function getNbApplications()
    {
        return $this->nbApplications;
    }


//    /**
//     * @param string $slug
//     */
//    public function setSlug($slug)
//    {
//        $this->slug = $slug;
//    }
//    /**
//     * @return string
//     */
//    public function getSlug()
//    {
//        return $this->slug;
//    }


//    /**
//     * @return bool
//     *
//     * @Assert\IsTrue()
//     */
//    public function isTitle()
//    {
//        return false;
//    }

//    /**
//     * @param ExecutionContextInterface $title
//     * @Assert\Callback()
//     */
//    public function isContentValid(ExecutionContextInterface $title){
//        $forbiddenWords = array('recherche', 'contrat');
//
//        // Vérification si le contenu ne contient pas les mots interdits
//        if (preg_match('#'.implode('|', $forbiddenWords).'#', $this->getTitle())){
//            // règle violée donc on définit l'erreur
//            $title
//                ->buildViolation('Contenu invalide, merci de ne pas utiliser les mots "recherche" et "contrat" dans votre titre d\'annonce.')
//                ->atPath('title')   // attribut de l'objet qui est violé
//                ->addViolation();        // déclenche l'erreur
//        }
//    }

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
