<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Class TaskController
 * @package AppBundle\Controller
 */
class TaskController extends Controller
{
    /**
     * @Route("/", name="app.task.list")
     *
     *
     */
    public function listAction()
    {
        // A modifier pour le mettre dans un service
        $tasks = $this->getDoctrine()->getManager()->getRepository(Task::class)->getListTasks();
        return $this->render(':task:list.html.twig', array(
            'tasks' => $tasks

        ));

    }
}
