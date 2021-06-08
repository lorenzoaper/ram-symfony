<?php

namespace App\Controller;

use App\Controller\PostController;
use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\ORM\Mapping\Id;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     * @Route("/", name="home")
     */
    public function index(PostRepository $postRepo): Response
    {

        $oneMessage = $postRepo->getRandomMessage();
        dump($oneMessage);
        $messages = [$oneMessage];

        // $postRepo = $this->getDoctrine()->getRepository(Post::class);



        return $this->render('home/index.html.twig', [
            "messages" => $messages
        ]);
    }
}
