<?php

namespace EV\PlatformBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use EV\PlatformBundle\Entity\Advert;
use EV\PlatformBundle\Entity\Image;

class LoadAdvert extends AbstractFixture implements OrderedFixtureInterface
{
    // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
    /**
     * @param ObjectManager $manager
     */
    public function load (ObjectManager $manager) {

        $advert1 = new Advert();
        $advert1->setDate(new \DateTime());
        $advert1->setTitle('H/F développeur PHP/Symfony');
        $advert1->setDescription('
            <p>
                Au sein du pôle IT, sous la direction du Responsable Système d’Information, vous serez en charge de :
                <ul>
                    <li>Concevoir, développer et maintenir des projets Front/Back-End.</li>
                    <li>Respecter les bonnes pratiques de codage.</li>
                    <li>Tester et valider les fonctionnalités développées.</li>
                    <li>La veille technologique</li>
                </ul>
            </p>');
        $advert1->setPublished(1);
        $advert1->setProfile('
            <p>Vous êtes diplômé(e) d’un Bac +2/5 en Informatique .</p>
            <p>Profil jeune diplômé avec le goût du challenge.</p>
            <p>Vous avez le goût du travail en équipe et la volonté de vous investir au sein d’une start-up en pleine croissance.</p>
            <p>Vous êtes organisé(e), rigoureux(se), motivé(e).</p>
            <p>Type d\'emploi : Temps plein </p>
            <p> Formation(s) exigée(s) :
                <ul>
                    <li>Études secondaires(niveau Bac)</li>
                </ul>
            </p>
        ');
        $advert1->setDetails('<p>Web-atrio est une entreprise dynamique qui fonctionne en tant qu\'entreprise libérée .</p>');
        $advert1->addCategory($this->getReference('category2'));
        $advert1->addApplication($this->getReference('application1'));
        $advert1->increaseApplication();
        $advert1->addApplication($this->getReference('application2'));
        $advert1->increaseApplication();


        $advert2 = new Advert();
        $advert2->setDate(new \DateTime());
        $advert2->setTitle('H/F développeur Android');
        $advert2->setDescription('
            <ul>
                <li>Participer à la rédaction du cahier des charges pour définir les besoins fonctionnels et techniques</li>
                <li>Concevoir, réaliser, développer des applications mobiles Android en langage natif</li>
                <li>Tester vos réalisations, piloter les phases de recette et validation</li>
                <li>Maintenir et faire évoluer les applications existantes</li>
                <li>Effectuer une veille technologique sur les technologies du marché</li>
            </ul>
        ');
        $advert2->setPublished(1);
        $advert2->setProfile('
            <ul>
                <li>De formation minimum bac +3 en informatique, vous disposez d’au moins un an d’expérience en entreprise</li>
                <li>Maitrise de JAVA et DALVIK</li><li>Connaissance des IDE (Eclipse, Netbeans, Android Studio)</li>
                <li>La maitrise de l’anglais est souhaitable</li>
            </ul>
        ');
//        $advert2->setDetails('');
        $advert2->addCategory($this->getReference('category3'));


        $advert3 = new Advert();
        $advert3->setDate(new \DateTime());
        $advert3->setTitle('H/F Intégrateur web / Graphiste');
        $advert3->setDescription('
            <p>Au sein du pôle animation digitale et studio graphique, vous serez en charge de l’intégration et du webdesign sur les emailing & les sites d\'un de nos clients .</p >
            <p>Vous interviendrez pour la production des visuels, tout en respectant les guides-lines et la charte graphique du groupe pour animer les différents services.</p>
            <ul>
                <li>Design des emailing & des sites</li>
                <li>Intégration email et pages web dans les environnements clients</li>
                <li>Recommandations d’optimisations graphiques et ergonomiques</li>
            </ul>
        ');
        $advert3->setPublished(1);
        $advert3->setProfile('
           <ul>
                <li>De formation minimum bac +3 en informatique, vous disposez d’au moins un an d’expérience en entreprise</li>
                <li>Maitrise de JAVA et DALVIK</li><li>Connaissance des IDE (Eclipse, Netbeans, Android Studio)</li>
                <li>La maitrise de l’anglais est souhaitable</li>
            </ul>
        ');
        $advert3->setDetails('<p>Web-atrio est une entreprise dynamique qui fonctionne en tant qu\'entreprise libérée .</p>');
        $advert3->addCategory($this->getReference('category4'));
        $advert3->addCategory($this->getReference('category5'));
        $advert3->addApplication($this->getReference('application3'));
        $advert3->addApplication($this->getReference('application4'));
        $advert3->increaseApplication();


        $advert4 = new Advert();
        $advert4->setDate(new \DateTime());
        $advert4->setTitle('Chef de projet web H/F');
        $advert4->setDescription('
            <ul>
                <li>Evaluation de la faisabilité technique des projets,</li>
                <li>Suivi de projets, coordination ( mini- sites, sites et oéprations digitales)</li>
                <li>Réalisation de cahiers de charges pour les appels d\'offres de prestataires,</li>
                <li>Réalisation et suivi de rétro - planning de production,</li>
                <li>Vérification finales avant envoie au client,</li>
                <li>Suivi des noms de domaines,</li>
                <li> Suivi du blog agence et des pages MEDIAPRISM L\'Agence sur les réseaux sociaux ( Facebook, Twitter)</li>
            </ul>');
        $advert4->setPublished(1);
        $advert4->setProfile('
            <ul>
                <li>Maîtrise de la gestion de projet,</li>
                <li>Analyse des devis des prestataires,</li>
                <li> Maîtrise des logiciels et des principaux langages de programmation,</li>
                <li>Maîtrise des innovations digitales,</li>
                <li>Connaissance codage,</li>
                <li>Autonomie pour animer coordonner et conduire un projet,</li>
                <li>Travail en équipe, qualités relationnelles, réactivité, rigueur et souplesse.</li>
            </ul>
        ');
//        $advert4->setDetails('');
        $advert4->addCategory($this->getReference('category6'));
        $advert4->addApplication($this->getReference('application5'));
        $advert4->increaseApplication();
        $advert4->addApplication($this->getReference('application6'));
        $advert4->increaseApplication();
        $advert4->addApplication($this->getReference('application7'));
        $advert4->increaseApplication();


        $image1 = new Image();
        $image1->setUrl('png');
        $image1->setAlt('webatrio.png');

        $image2 = new Image();
        $image2->setUrl('png');
        $image2->setAlt('webatrio.png');

        $image3 = new Image();
        $image3->setUrl('png');
        $image3->setAlt('webatrio.png');

        $image4 = new Image();
        $image4->setUrl('png');
        $image4->setAlt('webatrio.png');

        $advert1->setImage($image1);
        $advert2->setImage($image2);
        $advert3->setImage($image3);
        $advert4->setImage($image4);

        $manager->persist($advert1);
        $manager->persist($advert2);
        $manager->persist($advert3);
        $manager->persist($advert4);

        $manager->flush();

        $this->addReference('advert1', $advert1);
        $this->addReference('advert2', $advert2);
        $this->addReference('advert3', $advert3);
        $this->addReference('advert4', $advert4);
    }


    /**
     * The order in which fixtures will be loaded.
     *
     * @return int
     */
    public function getOrder()
    {
        return 4;
    }
}