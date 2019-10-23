<?php

namespace AppBundle\Controller;

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
        return $this->render('pages/index.html.twig');

    }

    /**
     * @Route("/create", name="create_posts_route")
     */
    public function createPostsAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('pages/create.html.twig');

    }

    /**
     * @Route("/view/{id}", name="view_posts_route")
     */
    public function viewPostsAction($id)
    {
        // replace this example code with whatever you need
        return $this->render('pages/view.html.twig');

    }

    /**
     * @Route("/edit/{id}", name="edit_posts_route")
     */
    public function editPostsAction($id)
    {
        // replace this example code with whatever you need
        return $this->render('pages/edit.html.twig');

    }

    /**
     * @Route("/delete/{id}", name="delete_posts_route")
     */
    public function deletePostsAction($id)
    {
        // replace this example code with whatever you need
        return $this->render('pages/delete.html.twig');

    }
}
