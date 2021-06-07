<?php

namespace App\Controller;

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
        $messages = [];

        // $postRepo = $this->getDoctrine()->getRepository(Post::class);

        $max = 136;
        $min = 93;

        $messages = $postRepo->findBy(array('id' => random_int($min, $max)));



        return $this->render('home/index.html.twig', [
            "messages" => $messages
        ]);
    }
}
