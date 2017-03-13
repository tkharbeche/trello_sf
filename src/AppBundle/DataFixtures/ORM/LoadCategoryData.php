<?php
/**
 * Created by PhpStorm.
 * User: Utilisateur
 * Date: 13/03/2017
 * Time: 14:22
 */

namespace AppBundle\DataFixtures\ORM;


use AppBundle\Entity\Category;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
class LoadCategoryData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $category = new Category();
        $category->setName("To Do");
        $this->addReference('categoryToDo', $category);
        $manager->persist($category);

        $category = new Category();
        $category->setName("In Progress");
        $this->addReference('categoryInProgress', $category);
        $manager->persist($category);


        $category = new Category();
        $category->setName("Done");
        $this->addReference('categoryDone', $category);
        $manager->persist($category);

        $category = new Category();
        $category->setName("Bugs");
        $this->addReference('categoryBugs', $category);
        $manager->persist($category);

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }

}