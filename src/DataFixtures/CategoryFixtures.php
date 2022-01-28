<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $category = new Category();
        $category->setName("PHP");
        $category->setColor("#0000FF");
        $manager->persist($category);

        $category2 = new Category();
        $category2->setName("JS");
        $category2->setColor("#FF0000");
        $manager->persist($category2);

        $category3 = new Category();
        $category3->setName("SQL");
        $category3->setColor("#00FF00");
        $manager->persist($category3);

        $manager->flush();
    }
}
