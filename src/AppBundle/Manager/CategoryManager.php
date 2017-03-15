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

    public function create()
    {
        return new Category();
    }

    public function save(Category $category)
    {
        if( null === $category->getId() )
        {
            $this->entityManager->persist($category);
        }

        $this->entityManager->flush();
    }

    private function repository()
    {
        return $this->entityManager->getRepository(Category::class);
    }

}