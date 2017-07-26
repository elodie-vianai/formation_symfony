<?php

namespace EV\PlatformBundle\Purger;

use Doctrine\ORM\EntityManagerInterface;

class AdvertPurger
{
    /**
     * @var EntityManagerInterface
     */
    private $em;


    /**
     * AdvertPurger constructor.
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        // Injection de l'EntityManager
        $this->em = $em;
    }


    /**
     * See AdvertRepository + AdvertSkillRepository + file Purger/Purge + file services.yml
     * @param $days
     */
    public function purge($days)
    {
        $advertRepository      = $this->em->getRepository('OCPlatformBundle:Advert');
        $advertSkillRepository = $this->em->getRepository('OCPlatformBundle:AdvertSkill');

        // date d'il y a $days jours
        $date = new \Datetime($days.' days ago');

        // Récupération des annonces à supprimer
        $listAdverts = $advertRepository->getAdvertsBefore($date);

        // Parcours les annonces pour les supprimer effectivement
        foreach ($listAdverts as $advert) {
            //récupération des AdvertSkill liées à cette annonce
            $advertSkills = $advertSkillRepository->findBy(array('advert' => $advert));
            // Pour les supprimer toutes avant de pouvoir supprimer l'annonce elle-même
            foreach ($advertSkills as $advertSkill) {
                $this->em->remove($advertSkill);
            }
            //suppression de l'annonce
            $this->em->remove($advert);
        }
        //ne pas oublier le flush !
        $this->em->flush();
    }
}
