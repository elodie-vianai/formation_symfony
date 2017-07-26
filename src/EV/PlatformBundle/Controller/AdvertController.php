<?php


namespace EV\PlatformBundle\Controller;

use EV\PlatformBundle\Entity\Advert;
use EV\PlatformBundle\Event\PlatformEvents;
use EV\PlatformBundle\Event\MessagePostEvent;
use EV\PlatformBundle\Form\AdvertEditType;
use EV\PlatformBundle\Form\AdvertType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AdvertController extends Controller
{
#region /******************** LIST OF ALL ADVERTS ***********************************************************************/
    /**
     * Display all adverts posted
     *
     * See in AdvertRepository + Twig file (Resources/Views/Advert/listAdverts) + entity Advert
     *
     * @return Response
     * @internal param $page
     */
    public function listAction()
    {
        $listAdverts = $this->getDoctrine()
            ->getManager()
            ->getRepository('EVPlatformBundle:Advert')
            ->getAdverts();

        // On donne toutes les informations nécessaires à la vue
        return $this->render('EVPlatformBundle:Advert:listAdverts.html.twig', array(
            'listAdverts' => $listAdverts,
        ));
    }
#endregion


#region /******************** VIEW OF AN ADVERT *************************************************************************/
    /**
     * Display the details of a specific advert
     *
     * See AdvertRepository + ApplicationRepository + AdvertSkillRepository + entities Advert, [...]
     * Application, Skill and AdvertSkill + Twig file (Resources/Views/Advert/view) + entities
     *
     * @param Advert $advert
     * @return Response
     */
    public function viewAction(Advert $advert)
    {
        if (null === $advert) {
            throw new NotFoundHttpException('L\'annonce demandée n\'existe pas.');
        }

        // Récupération du repository
        $em = $this->getDoctrine()->getManager();
        // Récupération de la liste des candidatures de cette annonce
        $listApplications = $em
            ->getRepository('EVPlatformBundle:Application')
            ->findBy(array('advert' => $advert));

        // Récupération de la liste des AdvertSkill
        $listAdvertSkills = $em
            ->getRepository('EVPlatformBundle:AdvertSkill')
            ->findBy(array('advert' => $advert->getId()));

        return $this->render('EVPlatformBundle:Advert:view.html.twig', array(
            'advert' => $advert,
            'listApplications' => $listApplications,
            'listAdvertSkills' => $listAdvertSkills
        ));
    }
#endregion


#region /******************** ADD A NEW ADVERT **************************************************************************/
    /**
     * Add a new advert
     *
     * See entity Advert + Twig file(Resources/Views/Advert/add)
     *
     * @param Request $request
     * @return RedirectResponse|Response
     * @throws \Exception
     * @Security("has_role('ROLE_COMPANY')")
     */
    public function addAction(Request $request)
    {
        $user = $this->getUser();
        $advert = New Advert();

        $advert->setUser($user);
        $advert->setDate(new \DateTime());

        $form = $this->createForm(AdvertType::class, $advert);

        // Si la requête est en POST et que les valeurs sont validées par le Validator
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
//            // Création de l'événement avec ses 2 arguments
//            $event = new MessagePostEvent($advert->getDescription(), $advert->getUser());
//
//            // Déclenchement de l'événement
//            $this->get('event_dispatcher')->dispatch(PlatformEvents::POST_MESSAGE, $event);
//
//            // Récupération de ce qui a été modifié par le ou les listeners, ici le message
//            $advert->setDescription($event->getMessage());

            // enregistrement de l'objet $advert dans la bdd
            $em = $this->getDoctrine()->getManager();
            $em->persist($advert);
            $em->flush();

            $request->getSession()->getFlashBag()->add('succes', 'Annonce bien enregistrée !');

            // Redirection vers la page de visualisation de cette annonce
            return $this->redirectToRoute('ev_platform_view_advert', array('id' => $advert->getId()));
        }

        // Si ce n'est pas un post, affichage du formulaire
        return $this->render('EVPlatformBundle:Advert:add.html.twig', array(
            'form' => $form->createView()
        ));
    }
#endregion


#region /******************** EDIT AN ADVERT ****************************************************************************/
    /**
     * Edit a specific advert
     *
     * See AdvertRepository + Twig file (Resources/Views/Advert/edit) + entity Advert
     *
     * @param Advert $advert
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function editAction(Advert $advert, Request $request)
    {
        if (null === $advert) {
            throw new NotFoundHttpException('L\'annonce demandée n\'existe pas.');
        }

        $form = $this->createForm(AdvertEditType::class, $advert);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()->add('info', 'Annonce bien modifiée');

            return $this->redirectToRoute('ev_platform_list_all_adverts');
        }

        return $this->render('EVPlatformBundle:Advert:edit.html.twig', array(
            'advert' => $advert,
            'form' => $form->createView()
        ));
    }
#endregion


#region /******************** DELETE A NEW ADVERT **************************************************************************/
    /**
     * Delete a specific advert.
     *
     * See AdvertRepository + Twig file (Resources/Views/Advert/delete) + entity Advert
     *
     * @param Advert $advert
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function deleteAction(Advert $advert, Request $request)
    {
        if (null === $advert->getId()) {
            throw new NotFoundHttpException('L\'annonce d\'id ' . $advert->getId() . 'n\'existe pas.');
        }

        // Création d'un formulaire vide qui ne contiendra que le champ CSRF pour protéger la suppression d'annonce contre cette faille
        $form = $this->get('form.factory')->create();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $this->getDoctrine()->getManager()->remove($advert);
            $this->getDoctrine()->getManager()->flush();

            $request->getSession()->getFlashBag()->add('success', "L'annonce a bien été supprimée.");

            return $this->redirectToRoute('ev_platform_list_all_adverts');
        }

        return $this->render('EVPlatformBundle:Advert:delete.html.twig', array(
            'advert' => $advert,
            'form' => $form->createView(),
        ));
    }
#endregion


#region /******************** PURGE ADVERTS **************************************************************************/

    /**
     * Purge adverts.
     *
     * See ?
     *
     * @param $days
     * @param Request $request
     * @return RedirectResponse
     */
    public function purgeAction($days, Request $request)
    {
        // Récupération du service
        $purger = $this->get('ev_platform.purger.advert');

        // Purge des annonces
        $purger->purge($days);

        // Ajout d'un message flash arbitraire
        $request->getSession()->getflashBag()->add('success', "Les annonces plus vieilles que $days jours ont été purgées.");

        // Redirection
        return $this->redirectToRoute('ev_platform_list_all_adverts');
    }
#endregion


#region /******************** TRANSLATOR ********************************************************************************/
//    public function translationAction($name){
//        $translator = $this->get('translator');
//        $texte = $translator->trans('Goodbye!');
//        return $this->render('EVPlatformBundle:Advert:translation.html.twig', array(
//            'name'  =>  $name,
//            'texte' =>  $texte
//        ));
//    }
#endregion
}