<?php
/**
 * Created by PhpStorm.
 * User: ciurb
 * Date: 09.08.2018
 * Time: 19:42
 */

namespace App\Controller;

use App\Form\LoginForm;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SecurityController extends Controller

{

    /**
     * @Route("/login", name="security_login")
     */
    public function loginAction(){
        $authenticationUtils = $this->get('security.authentication_utils');


        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();


        // last username entered by the user

        $lastUsername = $authenticationUtils->getLastUsername();


        $form = $this->createForm(LoginForm::class, [
            '_username' => $lastUsername,
        ]);


        return $this->render('login.html.twig', array(

                'form' => $form->createView(),
                'error' => $error,
            )
        );
    }


}









