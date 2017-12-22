<?php

namespace App\Controller;

use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request, AuthenticationUtils $authUtils)
    {

        if($this->getUser() === null){

            // get the login error if there is one
            $error = $authUtils->getLastAuthenticationError();

            // last username entered by the user
            $lastUsername = $authUtils->getLastUsername();

            return $this->render('security/login.html.twig', array(
                'last_username' => $lastUsername,
                'error'         => $error,
            ));

        } else {

            /* Set User isActive on login */
            /* NOT HERE */

//            $em = $this->getDoctrine()->getManager();
//            $user = $em->getRepository("App:User")->findBy(['id' => '11']);
//            $user->setIsActive(1);
//            $em->flush();

            return $this->redirectToRoute("home");

        }

    }

}
