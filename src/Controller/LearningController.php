<?php

namespace App\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LearningController extends AbstractController
{
    /**
     * @Route("/learning", name="learning")
     */
    public function index(): Response
    {
        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController',
        ]);
    }

    public function aboutMe(): Response
    {
        return $this->render('aboutMe.html.twig', [
            'name' => 'Alejandro'
        ]);
    }

    public function showMyName(): Response
    {
        return $this->render('showMyName.html.twig', [
            'name' => 'Unknown'
        ]);
    }

    public function changeMyName(): Response
    {
        return $this->render('changeMyName.html.twig', [
            'name' => $_POST['new-name']
        ]);
    }
}
