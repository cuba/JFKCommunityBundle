<?php

namespace JFK\CommunityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NewsController extends Controller
{
    public function indexAction()
    {
        return $this->render('JFKCommunityBundle:News:index.html.twig');
    }
}
