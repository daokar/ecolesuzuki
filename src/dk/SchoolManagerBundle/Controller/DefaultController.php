<?php

namespace dk\SchoolManagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('dkSchoolManagerBundle:Hello:index.html.twig', array('name' => $name));
    }
}
