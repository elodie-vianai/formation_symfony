<?php

namespace EV\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use EV\PlatformBundle\Entity\AdvertSkill;

class LoadAdvertSkill extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $advertSkill1 = new AdvertSkill();
        $advertSkill1->setSkill($this->getReference('skill-PHP'));
        $advertSkill1->setAdvert($this->getReference('advert1'));
        $advertSkill1->setLevel('Tous profils');

        $advertSkill2 = new AdvertSkill();
        $advertSkill2->setSkill($this->getReference('skill-Symfony'));
        $advertSkill2->setAdvert($this->getReference('advert1'));
        $advertSkill2->setLevel('Tous profils');

        $advertSkill3 = new AdvertSkill();
        $advertSkill3->setSkill($this->getReference('skill-Illustrator'));
        $advertSkill3->setAdvert($this->getReference('advert3'));
        $advertSkill3->setLevel('Tous profils');

        $advertSkill4 = new AdvertSkill();
        $advertSkill4->setSkill($this->getReference('skill-Photoshop'));
        $advertSkill4->setAdvert($this->getReference('advert3'));
        $advertSkill4->setLevel('Tous profils');

        $advertSkill5 = new AdvertSkill();
        $advertSkill5->setSkill($this->getReference('skill-MS-Office'));
        $advertSkill5->setAdvert($this->getReference('advert4'));
        $advertSkill5->setLevel('Tous profils');

        $advertSkill6 = new AdvertSkill();
        $advertSkill6->setSkill($this->getReference('skill-Android'));
        $advertSkill6->setAdvert($this->getReference('advert2'));
        $advertSkill6->setLevel('Tous profils');

        $manager->persist($advertSkill1);
        $manager->persist($advertSkill2);
        $manager->persist($advertSkill3);
        $manager->persist($advertSkill4);
        $manager->persist($advertSkill5);
        $manager->persist($advertSkill6);

        $manager->flush();
    }

    /**
     *  The order in which fixtures will be loaded.
     *
     * @return int
     */
    public function getOrder()
    {
        return 5;
    }
}