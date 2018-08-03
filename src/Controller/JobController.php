<?php
/**
 * Created by PhpStorm.
 * User: ciurb
 * Date: 02.08.2018
 * Time: 11:25
 */
namespace App\Controller;
use App\Entity\Job;
use App\Form\JobForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;




class JobController extends Controller
{



    /**
     * @Route("/newjob", name="newj")
     */




    public function addAction(Request $request)
    {

        $form = $this->createForm(JobForm::class, new Job());
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $job = $form->getData();
            dump($job);
            $em = $this->getDoctrine()->getManager();
            $em->persist($job); //persist pune in entity manager sa salveze
            $em->flush();//salvare

        }

        $this->createForm(JobForm::Class, null);
        return $this->render('addjob.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}