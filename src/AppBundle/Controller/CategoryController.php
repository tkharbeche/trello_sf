<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CategoryController extends Controller
{
    /**
     * @Route("/", name="app.category.list")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function ListCatAction()
    {
        $categorys = $this->get('app.category.manager')->all();
        return $this->render(':category:list.html.twig', array(
            'categorys' => $categorys

        ));
    }
}
