<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Albums;
use App\Entity\Artist;
use App\Entity\Tracks;
use App\Entity\Categories;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create(locale: 'fr_FR');
        
        // boucle de création des artistes 20
        for ($i = 0; $i < 20; $i++) {
            $artist = new Artist();
            $artist->setName($faker->name);
            $manager->persist($artist);
        }

        // boucle de création des albums 20
        for ($i = 0; $i < 20; $i++) {
            $album = new Albums();
            $album->setAlbumName($faker->name);
            $album->setAlbumTitle($faker->name);
            $album->setAlbumType($faker->name);
            $album->setArtist($artist);
            $manager->persist($album);
        }
      
        // boucle de création des musiques 20
        for ($i = 0; $i < 20; $i++) {
            $track = new Tracks();
            $track->setName($faker->name);
            $track->setType($faker->name);
            $artist->addTrack($track);
            $manager->persist($track);
        }


       


        $manager->flush();
    }
}