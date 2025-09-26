<?php

namespace App\DataFixtures;

use App\Entity\Pain;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PainFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $pains = [
            'Classique',
            'Brioché',
            'Graines',
            'Complet'
        ];

        foreach ($pains as $key => $namePain) {
            $pain = new Pain();
            $pain->setName($namePain);
            $manager->persist($pain);

            $this->addReference('pain_' . strtolower($namePain), $pain);
        }

        $manager->flush();
    }
}
