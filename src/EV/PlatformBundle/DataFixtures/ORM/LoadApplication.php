<?php

namespace EV\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use EV\PlatformBundle\Entity\Application;


class LoadApplication extends AbstractFixture implements OrderedFixtureInterface
{
    /**
     * @param ObjectManager $manager
     */
    public function load (ObjectManager $manager) {

        $application1 = new Application();
        $application1->setDate(new \DateTime());
        $application1->setFirstName('Elodie');
        $application1->setLastName('WA');
        $application1->setContent('
            <p>
                Bonjour,
                <br>Je suis intéressée par votre offre d\'emploi. Pouvez - vous me contactez ?
                <br>
                Cordialement
            </p>
        ');

        $application2 = new Application();
        $application2->setDate(new \DateTime());
        $application2->setFirstName('John');
        $application2->setLastName('Doe');
        $application2->setContent('
            <p>
                Bonjour,
                <br>Je suis intéressée par votre offre d\'emploi. Pouvez - vous me contactez ?
                <br>
                Cordialement
            </p>
        ');

        $application3 = new Application();
        $application3->setDate(new \DateTime());
        $application3->setFirstName('Elodie');
        $application3->setLastName('WA');
        $application3->setContent('
            <p>
                Bonjour,
                <br>Je suis intéressée par votre offre d\'emploi. Pouvez - vous me contactez ?
                <br>
                Cordialement
            </p>
        ');

        $application4 = new Application();
        $application4->setDate(new \DateTime());
        $application4->setFirstName('John');
        $application4->setLastName('Doe');
        $application4->setContent('
            <p>
                Bonjour,
                <br>Je suis intéressée par votre offre d\'emploi. Pouvez - vous me contactez ?
                <br>
                Cordialement
            </p>
        ');


        $application5 = new Application();
        $application5->setDate(new \DateTime());
        $application5->setFirstName('Jeremy');
        $application5->setLastName('WA');
        $application5->setContent('
            <p>
                Bonjour,
                <br>Je suis intéressée par votre offre d\'emploi. Pouvez - vous me contactez ?
                <br>
                Cordialement
            </p>
        ');

        $application6 = new Application();
        $application6->setDate(new \DateTime());
        $application6->setFirstName('Laurent');
        $application6->setLastName('WA');
        $application6->setContent('
            <p>
                Bonjour,
                <br>Je suis intéressée par votre offre d\'emploi. Pouvez - vous me contactez ?
                <br>
                Cordialement
            </p>
        ');

        $application7 = new Application();
        $application7->setDate(new \DateTime());
        $application7->setFirstName('Arnaud');
        $application7->setLastName('WA');
        $application7->setContent('
            <p>
                Bonjour,
                <br>Je suis intéressée par votre offre d\'emploi. Pouvez - vous me contactez ?
                <br>
                Cordialement
            </p>
        ');

        $manager->persist($application1);
        $manager->persist($application2);
        $manager->persist($application3);
        $manager->persist($application4);
        $manager->persist($application5);
        $manager->persist($application6);
        $manager->persist($application7);

        $manager->flush();

        $this->addReference('application1', $application1);
        $this->addReference('application2', $application2);
        $this->addReference('application3', $application3);
        $this->addReference('application4', $application4);
        $this->addReference('application5', $application5);
        $this->addReference('application6', $application6);
        $this->addReference('application7', $application7);

    }

    /**
     * The order in which fixtures will be loaded.
     *
     * @return int
     */
    public function getOrder()
    {
        return 3;
    }
}