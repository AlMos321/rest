<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 18.01.15
 * Time: 3:56
 */

namespace Acme\DemoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\Doctrine;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Acme\DemoBundle\Entity\User;

class LoadUserData implements FixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     */

    function load(ObjectManager $manager){
        $alice = new User();
        $alice->setUsername('alice');
        $alice->setEmail('alice@screenfony.com');
        $alice->setPassword('fooalicepassword');

        $bob = new User();
        $bob->setUsername('bob');
        $bob->setEmail('bob@screenfony.com');
        $bob->setPassword('foobobpassword');

        $manager->persist($alice);
        $manager->persist($bob);

        $manager->flush();
    }

}