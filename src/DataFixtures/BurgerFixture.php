<?php

namespace App\DataFixtures;

use App\Entity\Burger;
use App\Entity\Pain;
use App\Entity\Oignon;
use App\Entity\Sauce;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\ORM\Mapping\Id;
use Doctrine\Persistence\ObjectManager;

class BurgerFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $painClassique = $manager->getRepository(Pain::class)->findOneBy(['name' => 'Classique']);
        $painBrioché = $manager->getRepository(Pain::class)->findOneBy(['name' => 'Brioché']);
        $painComplet = $manager->getRepository(Pain::class)->findOneBy(['name' => 'Complet']);

        // Premier burger
        $burger1 = new Burger();
        $burger1->setName('Classic Burger')
            ->setPrice(5.99)
            ->setPain($painClassique);

        $manager->persist($burger1);

        // Deuxième burger
        $burger2 = new Burger();
        $burger2->setName('Brioché Deluxe')
            ->setPrice(7.49)
            ->setPain($painBrioché);

        $manager->persist($burger2);

        // Troisième burger
        $burger3 = new Burger();
        $burger3->setName('Simple Burger')
            ->setPrice(4.99)
            ->setPain($painComplet);

        $manager->persist($burger3);

        $manager->flush();
    }
}
