<?php

namespace EV\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use EV\PlatformBundle\Entity\Skill;
class LoadSkill extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        // Liste des noms de compétences à ajouter
        $names = array('PHP', 'Symfony', 'Illustrator', 'Photoshop', 'MS-Office', 'Android');
        foreach ($names as $name) {
            // On crée la compétence
            $skill = new Skill();
            $skill->setName($name);
            // On la persiste
            $manager->persist($skill);
            $this->addReference('skill-'.$name, $skill);

        }
        // On déclenche l'enregistrement de toutes les compétences
        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}