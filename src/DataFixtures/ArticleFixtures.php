<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create();

        $categories = $manager->getRepository(Category::class)->findAll();

        for ($i = 0; $i < 100; $i++ ) {
            $article = new Article();

            $article->setTitle($faker->sentence());
            $article->setContent($faker->paragraph(4, true));
            $article->setDate($faker->dateTime());
            $article->setCategory($faker->randomElement($categories));

            $manager->persist($article);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return [
            CategoryFixtures::class,
        ];
    }
}
