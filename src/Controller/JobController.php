<?php

namespace App\Controller;

use App\Entity\Job;
use App\Form\JobType;
use App\Repository\JobRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
     * @Route("/job")
     */
class JobController extends AbstractController
{
    /**
     * @Route("/index", name="job")
     */
    public function index()
    {
        return $this->render('job/index.html.twig');
    }
    /**
     * @Route("/list")
     */
    public function listJob()
    {
        $job = ['coding','scraping','design'];
        return $this->render('job/list.html.twig', compact('job'));
    }
     /**
     * @Route("/save")
     */
    public function save(){
        $entityManager=$this->getDoctrine()->getManager();
        $job = new Job();
        $job->setName('ing');
        $job->setDescription('test desc');
        $entityManager->persist($job);
        $entityManager->flush();
        Return new Response('save this job'.$job->getId());
    }
        /**
     * @Route("/listall")
     */
    public function listallJob(JobRepository $rep)
    {
        $job =$rep->findAll();
        return $this->render('job/list.html.twig', compact('job'));
    }
        /**
     * @Route("/findby/{id}")
     */
    public function Jobbyid(JobRepository $rep,$id)
    {
        $job =$rep->find($id);
        return $this->render('job/jobbyid.html.twig', compact('job'));
    }
      /**
     * @Route("/ajout")
     */
    public function ajout(Request $request){

        $job = new Job();
        $form = $this->createForm(JobType::class,$job);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $imageFile = $form->get('image')->getData();
            $fileName=md5(uniqid()).'.'.$imageFile->getExtension();
            $imageFile->move($this->getParameter('image_directory'),$fileName);
            $job->setImage($fileName);
            $article = $form->getData();
            $entityManager=$this->getDoctrine()->getManager();
            $entityManager->persist($job);
            $entityManager->flush();
            
        }
        return $this->render('job/ajout.html.twig',['form' =>$form->createView()]);
    }
}
