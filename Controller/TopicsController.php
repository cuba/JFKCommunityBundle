<?php

namespace JFK\CommunityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use JFK\CommunityBundle\Form\Type\TopicType;
use JFK\CommunityBundle\Entity\Topic;
use Symfony\Component\HttpFoundation\Request;

class TopicsController extends Controller
{
    public function indexAction($page)
    {
        return $this->render('JFKCommunityBundle:Topic:index.html.twig');
    }

    public function newAction(Request $request)
    {
        $topic = new Topic();
        $form = $this->createForm(new TopicType(), $topic);

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            if ($form->isValid()) {
                //TODO: Add a form handler

                $data = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($data);
                $em->flush();
            }
        }

        $options = array();
        $options['form'] = $form->createView();
        return $this->render('JFKCommunityBundle:Topic:new.html.twig', $options);
    }

    public function deleteAction()
    {
        return $this->render('JFKCommunityBundle:Topic:delete.html.twig');
    }

    public function editAction($slug)
    {
        return $this->render('JFKCommunityBundle:Topic:edit.html.twig');
    }

    public function showAction($slug)
    {
        return $this->render('JFKCommunityBundle:Topic:topic.html.twig');
    }
}
