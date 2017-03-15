<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Category;
use AppBundle\Form\CategoryType;
use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as FOSRest;

/**
 * Class ApiCategoryController
 * @package AppBundle\Controller
 * @FOSRest\Route(path="/api/categories")
 */
class ApiCategoryController extends FOSRestController
{

    /**
     * @return \Symfony\Component\HttpFoundation\Response
     * @FOSRest\View()
     * @FOSRest\Get("/")
     */
    public function cgetAction()
    {
        return $this->get('app.category.manager')->all();

    }

    /**
     * @FOSRest\View()
     * @FOSRest\Get("/{id}")
     */

    public function getAction(Category $category)
    {
        return $category;
    }

    /**
     * @FOSRest\Post("/")
     * @FOSRest\View(statusCode=201)
     *
     */
    public function postAction(Request $request)
    {

        $form = $this->get('form.factory')->createNamed('', CategoryType::class, $this->get('app.category.manager')->create(), ['csrf_protection'=> false,]);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $this->get('app.category.manager')->save($form->getData());
            return $form->getData();
        }

        return new View($form->getErrors(), Response::HTTP_BAD_REQUEST);
    }
}
