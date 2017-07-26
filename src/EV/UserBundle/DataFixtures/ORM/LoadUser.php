<?php

namespace EV\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use EV\UserBundle\Entity\User;

class LoadUser extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $user1 = new User();
        $user1->setUsername('elodie');
        $user1->setPassword('mdp');
        $user1->setPlainPassword('mdp');
        $user1->setEmail('elodie@gmail.com');
        $user1->setEnabled(1);
        $user1->setSalt('');
        $user1->setRoles(array('ROLE_CANDIDATE'));
        $user1->addApplication($this->getReference('application1'));
        $user1->addApplication($this->getReference('application3'));


        $user2 = new User();
        $user2->setUsername('john');
        $user2->setPassword('mdp');
        $user2->setPlainPassword('mdp');
        $user2->setEmail('johnDoe@gmail.com');
        $user2->setEnabled(1);
        $user2->setSalt('');
        $user2->setRoles(array('ROLE_CANDIDATE'));
        $user2->addApplication($this->getReference('application2'));
        $user2->addApplication($this->getReference('application4'));


        $user3 = new User();
        $user3->setUsername('laurent');
        $user3->setPassword('mdp');
        $user3->setPlainPassword('mdp');
        $user3->setEmail('laurent@gmail.com');
        $user3->setEnabled(1);
        $user3->setSalt('');
        $user3->setRoles(array('ROLE_CANDIDATE'));
        $user3->addApplication($this->getReference('application6'));

        $user4 = new User();
        $user4->setUsername('jeremy');
        $user4->setPassword('mdp');
        $user4->setPlainPassword('mdp');
        $user4->setEmail('jeremy@gmail.com');
        $user4->setEnabled(1);
        $user4->setSalt('');
        $user4->setRoles(array('ROLE_CANDIDATE'));
        $user4->addApplication($this->getReference('application5'));

        $user5 = new User();
        $user5->setUsername('arnaud');
        $user5->setPassword('mdp');
        $user5->setPlainPassword('mdp');
        $user5->setEmail('arnaud@gmail.com');
        $user5->setEnabled(1);
        $user5->setSalt('');
        $user5->setRoles(array('ROLE_CANDIDATE'));
        $user5->addApplication($this->getReference('application7'));

        $userCompany = new User;
        $userCompany->setUsername('WA');
        $userCompany->setPassword('mdp');
        $userCompany->setPlainPassword('mdp');
        $userCompany->setEmail('web-atrio@gmail.com');
        $userCompany->setEnabled('1');
        $userCompany->setSalt('');
        $userCompany->setRoles(array('ROLE_COMPANY'));
        $userCompany->addAdvert($this->getReference('advert1'));
        $userCompany->addAdvert($this->getReference('advert2'));
        $userCompany->addAdvert($this->getReference('advert3'));
        $userCompany->addAdvert($this->getReference('advert4'));

        $userAdmin = new User();
        $userAdmin->setUsername('admin');
        $userAdmin->setPassword('mdp');
        $userAdmin->setPlainPassword('mdp');
        $userAdmin->setEmail('admin@gmail.com');
        $userAdmin->setEnabled(1);
        $userAdmin->setSalt('');
        $userAdmin->setRoles(array('ROLE_CANDIDATE', 'ROLE_COMPANY', 'ROLE_ADMIN'));

        $manager->persist($user1);
        $manager->persist($user2);
        $manager->persist($user3);
        $manager->persist($user4);
        $manager->persist($user5);
        $manager->persist($userCompany);
        $manager->persist($userAdmin);

        $this->addReference('selodie', $user1);
        $this->addReference('john', $user2);
        $this->addReference('laurent', $user3);
        $this->addReference('jeremy', $user4);
        $this->addReference('arnaud', $user5);
        $this->addReference('WA', $userCompany);
        $this->addReference('admin', $userAdmin);

        // déclenchement de l'enregistrement
        $manager->flush();
    }

    /**
     * The order in which fixtures will be loaded.
     *
     * @return int
     */
    public function getOrder()
    {
        return 6;
    }
}