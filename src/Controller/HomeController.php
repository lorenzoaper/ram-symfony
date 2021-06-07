<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Repository\PostRepository;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     * @Route("/", name="home")
     */
    public function index(PostRepository $postRepo): Response
    {

        // $postRepo = $this->getDoctrine()->getRepository(Post::class);
        $messages = $postRepo->findAll();


        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            "messages" => $messages
        ]);
    }
}
