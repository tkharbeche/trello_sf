<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 14/03/2017
 * Time: 12:13
 */

namespace AppBundle\Manager;


use AppBundle\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;

class CategoryManager
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function all()
    {
        return $this->repository()->getAll();

    }

    private function repository()
    {
        return $this->entityManager->getRepository(Category::class);
    }

}