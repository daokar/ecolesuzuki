<?php

// src/dk/SchholManagerBundle/Controller/HelloController.php

namespace dk\SchoolManager\Controller;

use Symfony\Component\HttpFoundation\Response;

class HelloController
{
    public function indexAction($name)
    {
         return $this->render('dkSchoolManagerBundle:Hello:index.html.twig', array('name' => $name));

        // render a PHP template instead
        // return $this->render('dkSchoolManagerBundle:Hello:index.html.php', array('name' => $name));
    
    }
}
