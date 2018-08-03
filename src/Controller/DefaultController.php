<?php

namespace App\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;




class DefaultController extends Controller
{
    /**
     * @Route("/homepage", name="home")
     */


function indexAction(){

  return  $this->render('homepage.html.twig',['title'=>"De cati aplicanti ai nevoie?"]);


}
}