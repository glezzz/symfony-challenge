<?php
declare(strict_types=1);

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

    /**
     * @Route("/aboutMe", name="aboutMe")
     */
    public function aboutMe(): Response
    {
        return $this->render('learning/aboutMe.html.twig', [
            'name' => 'Alejandro'
        ]);
    }

    /**
     * @Route("/showMyName", name="showMyName")
     */
    public function showMyName(): Response
    {
        return $this->render('learning/showMyName.html.twig', [
            'name' => 'Unknown'
        ]);
    }

    /**
     * @Route("/changeMyName", name="changeMyName", methods={"POST"})
     */
    public function changeMyName(): Response
    {
        return $this->render('learning/changeMyName.html.twig', [
            'name' => $_POST['new-name']
        ]);
    }
}
