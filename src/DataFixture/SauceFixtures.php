<?php

namespace App\DataFixtures;

use App\Entity\Sauce;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
 
class SauceFixtures extends Fixture
{ 
    public function load(ObjectManager $manager): void
    {
        $nomsSauces = [
            'Blanche',
            'Mayonnaise',
            'Ketchup',
            'Barbecue',
            'Biggy',
            'Andalouse'
        ];
 
        foreach ($nomsSauces as $key => $nameSauce) {
            $sauce = new Sauce();
            $sauce->setName($nameSauce);
            $manager->persist($sauce);
        }
 
        $manager->flush();
    }
}