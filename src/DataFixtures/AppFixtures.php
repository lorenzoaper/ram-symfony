<?php

namespace App\DataFixtures;

use App\Entity\User;


use App\Entity\Post;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class AppFixtures extends Fixture
{
    private $passwordEncoder;
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    private function encode($user, $plaintextpassword)
    {
        return $this->passwordEncoder->encodePassword(
            $user,
            $plaintextpassword
        );
    }

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $simpleUser = new User();
            $simpleUser->setUsername($faker->firstName());
            $simpleUser->setPassword($this->encode($simpleUser, "toto"));
            $simpleUser->setRoles(['ROLE_USER']);
            $manager->persist($simpleUser);
            for ($j = 0; $i < random_int(0, 10); $j++) {
                $onePost = new Post();
                $onePost->setMessage($faker->text(255));
                $onePost->setAuthor($simpleUser);
                $manager->persist($onePost);
            }
        }
        $manager->flush();
    }
}
