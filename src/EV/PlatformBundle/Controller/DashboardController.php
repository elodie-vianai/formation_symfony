<?php


namespace EV\PlatformBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DashboardController extends Controller
{
#region /******************** INDEX PAGE ********************************************************************************/
    /**
     * Display the dashboard
     *
     * See in AdvertRepository + ApplicationRepository + Twig file (Resources/Views/dashbordPlatform) + entities Advert and Application
     *
     * @return Response
     */
    public function indexAction()
    {
        $user = $this->getUser();

        // Récupération du repository
        $em = $this->getDoctrine()->getManager();

        // Récupération de toutes les annonces
        $listAdverts = $em->getRepository('EVPlatformBundle:Advert')
            ->findBy(
                array(),                        // pas de critère
                array('date' => 'desc'),        // tri par date décroissante
                3,                         // sélection de 3 annonces max
                0                         // à partir du premier
            );

//        $listApplications = $this->getDoctrine()
//            ->getManager()
//            ->getRepository('EVPlatformBundle:Application')
//            ->findBy(
//                array(),
//                array('date'=>'desc'),
//                3,
//                0
//            );
        $listApplications = $user->getSortedApplication();

        // Appel de la vue
        return $this->render('EVPlatformBundle::dashboardPlatform.html.twig', array(
            'listAdverts' => $listAdverts,
            'listApplications' => $listApplications
        ));
    }
#endregion


#region /******************** MENU **************************************************************************************/
    /**
     * Display the 3 lasts adverts for the menu
     *
     * See in AdvertRepository + Twig file (Resources/Views/Advert/lastAdverts) + entity Advert
     *
     * @param $limit
     * @return Response
     */
    public function lastsAdverts_menuAction($limit)
    {
        // Récupération du repository
        $repository = $this->getDoctrine()->getManager()->getRepository('EVPlatformBundle:Advert');

        // Récupération de toutes les annonces
        $listAdverts = $repository->findBy(
            array(),                        // pas de critère
            array('date' => 'desc'),        // tri par date décroissante
            $limit,                         // sélection de $limit annonces
            0                         // à partir du premier
        );

        return $this->render('EVPlatformBundle:Advert:lastsAdverts_menu.html.twig', array(
                    'listAdverts' => $listAdverts)
            );
    }

    /**
     * Display the 3 lasts adverts related to a specific company
     *
     * See in AdvertRepository + Twig file (Resources/Views/Advert/lastAdverts) + entity Advert
     *
     * @param $limit
     * @return Response
     */
    public function myLastsAdvertsAction($limit)
    {
        $userId = $this->getUser()->getId();

        // Récupération du repository
        $repository = $this->getDoctrine()->getManager()->getRepository('EVPlatformBundle:Advert');

        // Récupération de toutes les annonces
        $listAdverts = $repository->findBy(
            array('user' => $userId),                        // pas de critère
            array('date'    => 'desc'),        // tri par date décroissante
            $limit,                         // sélection de $limit annonces
            0                         // à partir du premier
        );

        return $this->render('EVPlatformBundle:Advert:lastsAdverts.html.twig', array(
                'listAdverts' => $listAdverts)
        );
    }

    /**
     * Display the 3 lasts applications related to a specific company
     *
     * See in ApplicationRepository + Twig file (Resources/Views/Application/myLastsApplications) + entity Application
     *
     * @param $limit
     * @return Response
     */
    public function myLastsApplicationsAction($limit)
    {
        // Récupération du repository
        $repository = $this->getDoctrine()->getManager()->getRepository('EVPlatformBundle:Application');

        // Récupération de toutes les annonces
        $listApplications = $repository->findBy(
            array(),                        // pas de critère
            array('date'    => 'desc'),        // tri par date décroissante
            $limit,                         // sélection de $limit annonces
            0                         // à partir du premier
        );
//        var_dump($listApplications);die;
        return $this->render('EVPlatformBundle:Application:myLastsApplications.html.twig', array(
                'listApplications' => $listApplications)
        );
    }
#endregion
}