<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Post;
use Faker\Factory;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {
            // $simpleUser = new User();
            // $simpleUser->setNickname($faker->firstName());
            // $simpleUser->setPassword($this->encode($simpleUser, "toto"));
            // $simpleUser->setRoles(['ROLE_USER']);
            // $manager->persist($simpleUser);
            for ($j = 0; $i < random_int(0, 10); $j++) {
                $onePost = new Post();
                $onePost->setMessage($faker->text(60));
                // $onePost->setPseudo($faker->lastName());
                $manager->persist($onePost);
            }
        }
        $manager->flush();
    }
}
