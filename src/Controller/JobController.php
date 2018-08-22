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
use App\Form\JobSearchType;
use App\Model\JobSearch;
use App\Repository\JobRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;




class JobController extends Controller
{
    /**
     *

     *
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

            return $this->redirectToRoute('app_job_list');
        }

        $this->createForm(JobForm::Class, null);
        return $this->render('addjob.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/edit/{id}", name="app_edit_job")
     */
    public function editAction(Request $request, Job $job)
    {

        $form = $this->createForm(JobForm::class, $job);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $job = $form->getData();
            dump($job);
            $em = $this->getDoctrine()->getManager();
            $em->persist($job); //persist pune in entity manager sa salveze
            $em->flush();//salvare

            return $this->redirectToRoute('app_job_list');
        }

        $this->createForm(JobForm::Class, null);
        return $this->render('addjob.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/locuri-de-munca", name="app_job_list")
     * @Route("/locuri-de-munca/{keyword}", name="app_job_keyword")
     *
     *
     * @param Request $request
     * @return Response
     */
    public function listAction(Request $request, $keyword = null)
    {
        $jobSearch = new JobSearch();
        if ($keyword) {
            $jobSearch->setKeyword($keyword);
        }
        /** @var FormInterface $from */
        $from = $this->createForm(JobSearchType::class, $jobSearch);
        $from->handleRequest($request);

        /** @var JobRepository $repository */
        $repository = $this->getDoctrine()->getManager()->getRepository(Job::class);

        $jobs =  $repository->getByKeyword($jobSearch->getKeyword());

        return $this->render(
            'listjob.html.twig',
            [
                'form' => $from->createView(),
                'jobs' => $jobs,
                'keyword' => $jobSearch->getKeyword(),
            ]
        );
    }
}