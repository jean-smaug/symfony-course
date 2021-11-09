<?php

namespace App\DataFixtures;

use App\Entity\Article;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ArticleFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++ ) {
            $article = new Article();

            $article->setTitle($faker->sentence());
            $article->setContent($faker->paragraph(4, true));
            $article->setDate($faker->dateTime());

            $manager->persist($article);
        }

        $manager->flush();
    }
}
