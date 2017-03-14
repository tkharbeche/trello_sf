<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 14/03/2017
 * Time: 11:02
 */

namespace AppBundle\Manager;


use AppBundle\Entity\Task;
use Doctrine\ORM\EntityManagerInterface;

class TaskManager
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    /**
     * TaskManager constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return Task
     */

    public function create()
    {
        return new Task();
    }

    /**
     * @param Task $task
     */

    public function save(Task $task)
    {
        if(null === $task->getId() )
        {
            $this->entityManager->persist($task);
        }

        $this->entityManager->flush();

    }

    /**
     * @return array
     */

    public function getList()
    {
        $tasks = $this->getRepository()->getListTasks();
        return $tasks;
    }

    /**
     * @return \AppBundle\Repository\TaskRepository|\Doctrine\Common\Persistence\ObjectRepository
     */
    public function getRepository()
    {
        return $this->entityManager->getRepository(Task::class);
    }

}