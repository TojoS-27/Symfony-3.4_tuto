<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Post;
use AppBundle\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class PostController extends Controller
{
    /**
     * @Route("/post", name="show_posts_route")
     */
    public function showAllPostsAction(Request $request)
    {
        // replace this example code with whatever you need
        $posts = $this->getDoctrine()->getRepository('AppBundle:Post')->findAll();
        return $this->render('pages/index.html.twig', ['posts' => $posts]);

    }

    /**
     * @Route("/create", name="create_posts_route")
     * @Route("/edit/{id}", name="edit_posts_route")
     */
    public function registerPostsAction(Post $post = null, Request $request)
    {
        // replace this example code with whatever you need
        if(!$post){
        	$post = new Post;	
        }

		$manager = $this->getDoctrine()->getManager();
        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
        	$post = $form->getData();
        	$manager->persist($post);
			$manager->flush();

			$this->addFlash('message', 'Post Created Cuccessfuly !');

			return $this->redirectToRoute('show_posts_route', [ 'id' =>$post->getId() ]);

        }
        return $this->render('pages/create.html.twig', [
        	'formAjout' => $form->createView(), 
        	'editMode' => $post->getId() !== null 
        ]);

    }

    /**
     * @Route("/view/{id}", name="view_posts_route")
     */
    public function viewPostsAction($id)
    {
        // replace this example code with whatever you need
        $post = $this->getDoctrine()->getRepository('AppBundle:Post')->findOneById($id);
        return $this->render('pages/view.html.twig', [
        	'post' => $post, 
        ]);

    }

    // /**
    //  * @Route("/edit/{id}", name="edit_posts_route")
    //  */
    // public function editPostsAction($id)
    // {
    //     // replace this example code with whatever you need

    //     return $this->render('pages/edit.html.twig');

    // }

    /**
     * @Route("/delete/{id}", name="delete_posts_route")
     */
    public function deletePostsAction($id)
    {
        // replace this example code with whatever you need
        $manager = $this->getDoctrine()->getEntityManager();
        $posts = $manager->getRepository('AppBundle:Post')->findOneById($id);
        $manager->remove($posts);
        $manager->flush();

        return $this->redirectToRoute('show_posts_route');

    }
}
