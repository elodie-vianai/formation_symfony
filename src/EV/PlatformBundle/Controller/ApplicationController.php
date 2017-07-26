<?php


namespace EV\PlatformBundle\Controller;

use EV\PlatformBundle\Entity\Advert;
use EV\PlatformBundle\Entity\Application;
use EV\PlatformBundle\Form\ApplicationType;
use EV\PlatformBundle\Entity\Image;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class ApplicationController extends Controller
{
#region /******************** LIST OF ALL APPLICATIONS ******************************************************************/
    /**
     * Display all applications
     *
     * See in ApplicationRepository + Twig file (Resources/Views/Application/listApplications)
     *
     * @return Response
     */
    public function listAction()
    {
        $listApplications = '';
        $em = $this->getDoctrine()->getManager();
        $user = $this->getUser();
        foreach ($user->getRoles() as $role){
            if ($role === 'ROLE_CANDIDATE'){
                $listApplications = $user->getSortedApplication();
            }
            elseif ($role === 'ROLE_COMPANY') {
                $listApplications = $em
                    ->getRepository('EVPlatformBundle:Application')
                    ->getApplications();
            }
        }

//        var_dump($listAdverts);exit;
        return $this->render('EVPlatformBundle:Application:listApplications.html.twig', array(
            'listApplications' => $listApplications
        ));
    }
#endregion


#region /******************** VIEW OF AN APPLICATION ********************************************************************/
    /**
     * Display details of a specific application
     *
     * See in ApplicationRepository + Twig file (Resources/Views/Application/view)
     *
     * @param Application $application
     * @return Response
     */
    public function viewAction(Application $application)
    {
        if (null === $application->getId()) {
            throw new NotFoundHttpException('La candidature d\'id '. $application->getId() .'n\'existe pas.');
        }

        return $this->render('EVPlatformBundle:Application:view.html.twig', array(
            'application'            => $application,
        ));
    }
#endregion


#region /******************** APPLY TO AN ADVERT ************************************************************************/
    /**
     * Apply to an advert
     *
     * See in Application Entity
     *
     * @paramConverter("advert", options={"mapping": {"idadvert": "id"}})
     * @param Request $request
     * @param Advert $advert
     * @return RedirectResponse|Response
     */
    public function applyAction(Request $request, Advert $advert)
    {
        $em = $this->getDoctrine()->getManager();

//        $advert = $em->getRepository('EVPlatformBundle:Advert')->find($idadvert);

        $application = New Application();

        $form = $this->createForm(ApplicationType::class, $application);

        // Si la requête est en POST et que les valeurs sont validées par le Validator
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $application->setUser($this->getUser());
            $application->setAdvert($advert);
            // enregistrement de l'objet $advert dans la bdd
            $em->persist($application);
            $em->flush();

            $request->getSession()->getFlashBag()->add('succes', 'Candidature bien envoyée !');

            // Redirection vers la page de visualisation de cette annonce
            return $this->redirectToRoute('ev_platform_readApplication', array(
                'idadvert'=> $advert->getId(),
                'id' => $application->getId(),
            ));
        }

        // Si ce n'est pas un post, affichage du formulaire
        return $this->render('EVPlatformBundle:Application:apply.html.twig', array(
            'advert'    => $advert,
            'form'      => $form->createView()
        ));
    }
#endregion
}