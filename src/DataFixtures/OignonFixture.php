<?php

namespace App\DataFixtures;

use App\Entity\Oignon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class OignonFixture extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $oignons = [
            'Oignon rouge',
            'Oignon caramélisé',
            'Oignon frit',
            'Oignons crispy',
        ];

        foreach ($oignons as $key => $nameOignon) {
            $oignon = new Oignon();
            $oignon->setName($nameOignon);
            $manager->persist($oignon);

            $this->addReference('oignon_' . $nameOignon, $oignon);
        }

        $manager->flush();
    }
}
