<?php

namespace JFK\CommunityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ForumsController extends Controller
{
    public function indexAction()
    {
        return $this->render('JFKCommunityBundle:Topic:index.html.twig');
    }

    public function newAction()
    {
        return $this->render('JFKCommunityBundle:Topic:new.html.twig');
    }

    public function deleteAction()
    {
        return $this->render('JFKCommunityBundle:Topic:delete.html.twig');
    }

    public function editAction()
    {
        return $this->render('JFKCommunityBundle:Topic:edit.html.twig');
    }
}
