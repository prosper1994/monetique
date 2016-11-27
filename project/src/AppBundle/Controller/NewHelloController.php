<?php
/**
 * Created by PhpStorm.
 * User: kazebushi
 * Date: 25/11/16
 * Time: 15:11
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class NewHelloController
{
    /**
     * @Route("/newhello")
     */
    public function showAction()
    {
        return new Response('Hello again visitor!');
    }
}