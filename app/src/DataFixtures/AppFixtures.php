<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Albums;
use App\Entity\Artist;
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

       

        // //boucle de création des albums 60
        // for ($i = 0; $i < 60; $i++) {
        //     $album = new Albums();
        //     $album->setAlbums($faker->name);
        //     $album->setAlbums($albumType[array_rand($albumType)]);
        //     $album->setArtist($artist);
        //     $manager->persist($album);
        // }
     

        $manager->flush();
    }
}