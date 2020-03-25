<?php

namespace App\DataFixtures;

use App\Entity\Property;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class PropertyFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
    	$faker = Factory::create('fr_FR');
    	for ($i = 0; $i < 18; $i++) {
    		$property = new Property();
    		$property
			    ->setTitle($faker->words(2,true))
    		    ->setDescription($faker->sentences(3, true))
			    ->setSurface($faker->numberBetween(25, 200))
			    ->setRooms($faker->numberBetween(2, 5))
			    ->setBedrooms($faker->numberBetween(1, 5))
			    ->setFloor($faker->numberBetween(0, 15))
			    ->setPrice($faker->numberBetween(50000, 1000000))
			    ->setHeat($faker->numberBetween(0, count(Property::HEAT) -1))
			    ->setCity($faker->city)
			    ->setAddress($faker->address)
			    ->setPostalCode($faker->postcode)
			    ->setSold(false);
		    $manager->persist($property);
	    }
        $manager->flush();
    }
}
