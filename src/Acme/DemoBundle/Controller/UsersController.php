<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 18.01.15
 * Time: 3:25
 */

namespace Acme\DemoBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Acme\DemoBundle\Entity\User;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use JMS\SerializerBundle\JMSSerializerBundle;
use JMS\Serializer\SerializerBuilder;
use Symfony\Component\HttpFoundation\Response;


class UsersController  extends FOSRestController {

    /**
     * @return array
     * @View()
     */

    public function getUsersAction(){
        $users = $this->getDoctrine()->getRepository("AcmeDemoBundle:User")
            ->findAll();

        $serializer = SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize($users, 'json');
       // echo $jsonContent;

        return new Response($jsonContent);
       // return $this->render(array("users" => $users));
    }

    /**
     * @param User $user
     * @return arrayArora
     * @View()
     * @ParamConverter("user", class = "AcmeDemoBundle:User")
     */
    public function getUserAction(User $user){

        $serializer = SerializerBuilder::create()->build();
        $jsonContent = $serializer->serialize($user, 'yml');
        return new Response($jsonContent);
       // return array("user" => $user);
    }


}