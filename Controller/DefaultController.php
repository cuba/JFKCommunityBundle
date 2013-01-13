<?php

namespace JFK\CommunityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('JFKCommunityBundle:Default:index.html.twig');
    }
}
