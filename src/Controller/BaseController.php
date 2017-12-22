<?php
/**
 * Created by PhpStorm.
 * User: Elie
 * Date: 16/12/2017
 * Time: 17:45
 */

namespace App\Controller;

use App\Entity\Message;

use App\Entity\User;
use App\Form\UserType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class BaseController extends Controller
{

    /**
     * @Route("/home", name="home")
     */
    public function home(Request $request) {

        $em = $this->getDoctrine()->getManager();

//        $user = $em->getRepository('App:User')->findBy(array('id' => $this->getUser()->getId()));
//        $user->setRoles(array('ROLE_ADMIN'));
//        $em->persist($user);
//        $em->flush();

        /* get les messages les injecter dans la vue */
        $messages = $em->getRepository('App:Message')->findAll();

        /* get les users actif les injecter dans la vue */
        $users = $em->getRepository('App:User')->findAll();

        return $this->render('Base/home.html.twig', array(
            'users' => $users,
            'messages' => $messages
        ));

    }


    /**
     * @Route("/send", name="send")
     */
    public function send(Request $request) {

        $request = Request::createFromGlobals();

        $em = $this->getDoctrine()->getManager();

        $user = $this->getUser();

        $message = new Message();
        $message->setDateTime(new \DateTime("Europe/Paris"));
        $message->setAuthorName($user->getUsername());
        $message->setAuthor($user->getId());



        if ($request->isMethod('POST')) {

            $text = $request->request->get("_text");
            $message->setText($text);

            $em->persist($message);
            $em->flush();

        }

        return $this->redirectToRoute('home');

    }

    /**
     * @Route("/profil", name="profil")
     * @param Request $request
     * @return Response
     */
    public function profil(Request $request) {

        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository("App:User")->findBy(array('id' => $this->getUser()->getId()));
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {

            return $this->redirectToRoute('home');

        }

        return $this->render('Base/profil.html.twig',
            array('form' => $form->createView())
        );

    }

}
