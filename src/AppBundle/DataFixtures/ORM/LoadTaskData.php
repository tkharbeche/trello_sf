<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 13/03/2017
 * Time: 14:22
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Task;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadTaskData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
/*      $task = new Task();
        $task->setCategory($this->getReference("categoryToDo"));
        $task->getName("Tache de test");
        $task->getDescription("cette tache fais un test");
        $task->getStatus("open");

        $manager->persist($task);

        $task = new Task();
        $task->setCategory($this->getReference("category-1"));
        $task->getName("Une autre tache de test");
        $task->getDescription("tache de test qui test la tache");
        $task->getStatus("open");

        $manager->persist($task);*/

        $datas = [
            [
                "name" => "Tache de test",
                "description" => "Cette tache fais un test",
                "status" => Task::STATUS_OPENED,
                "category" => $this->getReference('categoryToDo'),

            ],
            [
                "name" => "Une autre tache ",
                "description" => "Tache de test qui fais un test",
                "status" => Task::STATUS_OPENED,
                "category" => $this->getReference("categoryDone"),
            ],
        ];

        foreach($datas as $i => $data)
        {
            $task = new Task();
            $task->setName($data['name']);
            $task->setDescription($data['description']);
            $task->setStatus($data['status']);
            $task->setCategory($data['category']);
            $manager->persist($task);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 10;
    }


}