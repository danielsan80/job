<?php

namespace Idrolab\JobeetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/hello/{name}", name="jobeet_index")
     */
    public function indexAction($name)
    {
        return $this->render('IdrolabJobeetBundle:Default:index.html.twig', array('name' => $name));
    }
}
