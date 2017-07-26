<?php

namespace EV\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use EV\PlatformBundle\Entity\Category;

class LoadCategory extends AbstractFixture implements OrderedFixtureInterface
{
    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    public function load (ObjectManager $manager) {

        $category1 = new Category();
        $category1->setName('Administratif');

        $category2 = new Category();
        $category2->setName('Développement web');

        $category3 = new Category();
        $category3->setName('Développement mobile');

        $category4 = new Category();
        $category4->setName('Graphisme');

        $category5 = new Category();
        $category5->setName('Intégration');

        $category6 = new Category();
        $category6->setName('Gestion de projet');


        $manager->persist($category1);
        $manager->persist($category2);
        $manager->persist($category3);
        $manager->persist($category4);
        $manager->persist($category5);
        $manager->persist($category6);

        $manager->flush();

        $this->addReference('category1',$category1);
        $this->addReference('category2',$category2);
        $this->addReference('category3',$category3);
        $this->addReference('category4',$category4);
        $this->addReference('category5',$category5);
        $this->addReference('category6',$category6);
    }

    /**
     * The order in which fixtures will be loaded.
     *
     * @return int
     */
    public function getOrder()
    {
        return 2;
    }
}