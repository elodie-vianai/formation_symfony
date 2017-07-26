<?php

namespace EV\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{

#region ******************** INDEX PAGE *********************************************************************************/
    public function indexAction()
    {
        return $this->render('EVCoreBundle:Default:index.html.twig');
    }
#endregion


#region ******************** CONTACT PAGE *******************************************************************************/
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function contactAction(Request $request)
    {
        $session = $request->getSession();
        $session->getFlashBag()->add('info', 'La page de contact n\'est pas encore disponible, merci de revenir plus tard.');

        //return $this->render('EVCoreBundle:Default:contact.html.twig');
        return $this->redirectToRoute('ev_core_homepage');
    }
#endregion
}
