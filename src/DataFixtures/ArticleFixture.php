<?php

namespace App\DataFixtures;

use App\Entity\Articles;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class ArticleFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 10; $i++) {
            $article = new Articles();
            $article->setTitle("Titre de l'article n° $i")
                ->setImage("http://placehold.it/350x150")
                ->setContent("<p> Contenue de mon article n° $i</p>")
                ->setCreatedAt(new \DateTime());
            $manager->persist($article);
        }
        $manager->flush();
    }
}
