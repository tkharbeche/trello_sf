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
        $tasks = $this->get('app.task.manager')->getList();
        return $this->render(':task:list.html.twig', array(
            'tasks' => $tasks

        ));

    }
}
