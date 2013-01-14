<?php
namespace JFK\CommunityBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('content', 'textarea');
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'JFK\CommunityBundle\Entity\Post',
        );
    }

    public function getName()
    {
        return 'jfk_community_post';
    }
}