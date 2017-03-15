<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use AppBundle\Form\TaskType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class TaskController
 * @package AppBundle\Controller
 */
class TaskController extends Controller
{
    /**
     * @Route("/newTask", name="app.task.new", methods={"GET", "POST"})
     *
     *
     */
    public function newAction(Request $request)
    {
        $tasksManager = $this->get('app.task.manager');
        $task = $tasksManager->create();

        $form = $this->createForm(TaskType::class, $task);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $tasksManager->save($task);

            $this->addFlash("success", "Task added ! Good job");
            return $this->redirectToRoute("app.category.list");
        }

        return $this->render(":task:new.html.twig", [
            'form' => $form->createView(),
        ]);

    }

    /**
     * @Route("/task/{id}", name="app.task.update")
     * @param Request $request
     * @param Task $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function updateAction(Request $request, Task $id)
    {
        $tasksManager = $this->get('app.task.manager');

        $form = $this->createForm(TaskType::class, $id);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $tasksManager->updateTask($id);

            $this->addFlash("success", "Task updated ! Good job");
            return $this->redirectToRoute("app.category.list");
        }

        return $this->render(":task:new.html.twig", [
            'form' => $form->createView(),
        ]);


    }
}
