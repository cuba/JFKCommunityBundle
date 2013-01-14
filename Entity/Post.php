<?php

namespace JFK\CommunityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="posts")
 * @ORM\Entity
 */
class Post
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreated", type="datetime")
     */
    private $dateCreated;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateUpdated", type="datetime")
     */
    private $dateUpdated;

    /**
     * @ORM\ManyToOne(targetEntity="Topic", inversedBy="posts", cascade={"persist"})
     * @ORM\JoinColumn(name="topic_id", referencedColumnName="id")
     */
    protected $topic;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setDateCreated(new \DateTime());
        $this->setDateUpdated(new \DateTime());
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set content
     *
     * @param string $content
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;
    
        return $this;
    }

    /**
     * Get content
     *
     * @return string 
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Post
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    
        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set dateUpdated
     *
     * @param \DateTime $dateUpdated
     * @return Post
     */
    public function setDateUpdated($dateUpdated)
    {
        $this->dateUpdated = $dateUpdated;
    
        return $this;
    }

    /**
     * Get dateUpdated
     *
     * @return \DateTime 
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    /**
     * Set category
     *
     * @param \JFK\CommunityBundle\Entity\Topic $category
     * @return Post
     */
    public function setCategory(\JFK\CommunityBundle\Entity\Topic $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \JFK\CommunityBundle\Entity\Topic 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set topic
     *
     * @param \JFK\CommunityBundle\Entity\Topic $topic
     * @return Post
     */
    public function setTopic(\JFK\CommunityBundle\Entity\Topic $topic = null)
    {
        $this->topic = $topic;
    
        return $this;
    }

    /**
     * Get topic
     *
     * @return \JFK\CommunityBundle\Entity\Topic 
     */
    public function getTopic()
    {
        return $this->topic;
    }
}