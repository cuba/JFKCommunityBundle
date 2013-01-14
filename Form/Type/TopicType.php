<?php
namespace JFK\CommunityBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class TopicType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title', 'text');
        $builder->add('firstPost', new PostType());
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'JFK\CommunityBundle\Entity\Topic',
        );
    }

    public function getName()
    {
        return 'jfk_community_topic';
    }
}