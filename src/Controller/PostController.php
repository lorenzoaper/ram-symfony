<?php

namespace App\Controller;


use App\Entity\Post;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class PostController extends AbstractController
{
    /**
     * @Route("/new", name="new")
     */

    public function create(Request $request): Response
    {
        $user = $this->getuser();
        if ($user != null && $request->request->has('msg')) {



            $messages = $request->request->get('msg');
            $newPost = new Post();
            $newPost->setMessage($messages);
            $newPost->setAuthor($user);
            $manager = $this->getDoctrine()->getManager();
            $manager->persist($newPost);
            $manager->flush();
            return $this->redirectToRoute('home');
        }
        return $this->render('home/create.html.twig', []);
    }
}
