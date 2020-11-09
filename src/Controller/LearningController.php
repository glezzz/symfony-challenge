<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

class LearningController extends AbstractController
{
    private string $name;
    private $session;

    /**
     * LearningController constructor.
     * @param $session
     */
    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

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
        $this->name = $this->session->get('name', 'Unknown');
        if($this->name == 'Unknown'){
            return $this->redirectToRoute('home');
        }else {
            return $this->render('learn/aboutMe.html.twig', [
                'about_me' => 'this is about me',
                'name' => $this->name
            ]);
        }
    }

    /**
     * @Route("/showMyName", name="showMyName")
     */
    public function showMyName(): Response
    {
        $this->name = $this->session->get('name', 'Unknown');
        return $this->render('learn/showMyName.html.twig',
            ['name' => $this->name]);
    }

    /**
     * @Route("/changeMyName", name="changeMyName", methods={"POST"})
     */
    public function changeMyName(SessionInterface $session)
    {
        $this->session->set('name', $_POST['name']);
        return $this->redirectToRoute('home');
    }
}
