<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Albums;
use App\Entity\Artist;
use App\Entity\Categories;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create(locale: 'fr_FR');
        
        // boucle de création des artistes 60
        for ($i = 0; $i < 60; $i++) {
            $artist = new Artist();
            $artist->setName($faker->name);
            $manager->persist($artist);
        }

        // // boucle de création des albums 60
        // for ($i = 0; $i < 60; $i++) {
        //     $album = new Albums();
        //     $album->setArtist($artist);
        //     $album->setTitle($faker->title);
        //     $album->setYear($faker->year);
        //     $album->setGenre($faker->genre);
        //     $album->setCover($faker->cover);
        //     $manager->persist($album);
        // }

        // // boucle de création des pistes 60
        // for ($i = 0; $i < 60; $i++) {
        //     $album = new Albums();
        //     $album->setArtist($artist);
        //     $album->setTitle($faker->title);
        //     $album->setYear($faker->year);
        //     $album->setGenre($faker->genre);
        //     $album->setCover($faker->cover);
        //     $manager->persist($album);
        // }

        // // boucle de création des categories 10
        // for ($i = 0; $i < 10; $i++) {
        //     $category = new Categories();
        //     $category->setName($faker->word);
        //     $manager->persist($category);
        // }
      


       


        $manager->flush();
    }
}