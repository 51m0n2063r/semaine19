<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Posts;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PostController extends AbstractController
{
    /**
     * @Route("/post", name="post")
     */
    public function index()
    {
        $posts = $this->getDoctrine()
                     ->getRepository(Posts::class)
                     ->findAll();

        return $this->render('post/index.html.twig', array('posts' => $posts));
    }
    /**
     * @Route("/post/create", name="createPost")
     */
    public function store(Request $request)
    {
        $post = new Posts();
        $post->setTitle('Article'.random_int(0,100));
        $post->setContent("my text ici");
        $post->setAuthor('michel Drupéte');
        $post->setCreatedAt(new \DateTime('now'));

        $form = $this->createFormBuilder($post)
        ->add('title', TextType::class)
        ->add('content', TextareaType::class)
        ->add('author', TextType::class)
        ->add('save', SubmitType::class)
        ->getForm();

        $form->handleRequest($request);

    if($form->isSubmitted() && $form->isValid())
    {
        $post = $form->getData();

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($post);
        $entityManager->flush();

        return $this->redirectToRoute('post');
    }

        return $this->render('post/create.html.twig', array('form' => $form->createView()));
    }
    /**
     * @Route("/post/{id}", name="showPost")
     */
    public function show($id)
    {
        $post = $this->getDoctrine()
                     ->getRepository(posts::class)
                     ->find($id);

    return $this->render("post/show.html.twig", compact('post'));
    }
     /**
     * @Route("/post/edit/{id}", name="editPost")
     */

    public function edit(Request $request, $id)
    {
        $post = $this->getDoctrine()
                     ->getRepository(posts::class)
                     ->find($id);

        $form = $this->createFormBuilder($post)
                     ->add('title', TextType::class)
                     ->add('content', TextareaType::class)
                     ->add('author', TextType::class)
                     ->add('save', SubmitType::class)
                     ->getForm();
             
         $form->handleRequest($request);

         if($form->isSubmitted() && $form->isValid())
    {
        $post = $form->getData();

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($post);
        $entityManager->flush();

        return $this->redirectToRoute('post');
    }
    return $this->render("post/create.html.twig", array("form" => $form->createView()));    
    }   
}
