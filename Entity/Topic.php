<?php

namespace JFK\CommunityBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use JFK\CommunityBundle\Utilities\TextUtilities;

/**
 * Topic
 *
 * @ORM\Table(name="topics")
 * @ORM\Entity
 */
class Topic
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
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

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
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean")
     */
    private $enabled;

    /**
     * @var boolean
     *
     * @ORM\Column(name="approved", type="boolean")
     */
    private $approved;

    /**
     * @var boolean
     *
     * @ORM\Column(name="published", type="boolean")
     */
    private $published;

    /**
     * @ORM\OneToMany(targetEntity="Post", mappedBy="topic", cascade={"persist"})
     */
    protected $posts;
    
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->posts = new ArrayCollection();
        $firstPost = new Post();
        $firstPost->setTopic($this);
        $this->posts[] = $firstPost;
        $this->setDateCreated($firstPost->getDateCreated());
        $this->setDateUpdated($firstPost->getDateUpdated());
        $this->setEnabled(true);
        $this->setPublished(true);
        $this->setApproved(true);
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
     * Set title
     *
     * @param string $title
     * @return Topic
     */
    public function setTitle($title)
    {
        $this->title = $title;
        $this->setSlug(TextUtilities::slugify($title)); 
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Topic
     */
    public function setDateCreated(\DateTime $dateCreated)
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
     * @return Topic
     */
    public function setDateUpdated(\DateTime $dateUpdated)
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
     * Set approved
     *
     * @param boolean $approved
     * @return Topic
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;
    
        return $this;
    }

    /**
     * Get approved
     *
     * @return boolean 
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * Set published
     *
     * @param boolean $published
     * @return Topic
     */
    public function setPublished($published)
    {
        $this->published = $published;
    
        return $this;
    }

    /**
     * Get published
     *
     * @return boolean 
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Topic
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;
    
        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Add posts
     *
     * @param \JFK\CommunityBundle\Entity\Post $posts
     * @return Topic
     */
    public function addPost(\JFK\CommunityBundle\Entity\Post $posts)
    {
        $this->posts[] = $posts;
    
        return $this;
    }

    /**
     * Remove posts
     *
     * @param \JFK\CommunityBundle\Entity\Post $posts
     */
    public function removePost(\JFK\CommunityBundle\Entity\Post $posts)
    {
        $this->posts->removeElement($posts);
    }

    /**
     * Get posts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * Get firstPost
     *
     * @return \JFK\CommunityBundle\Entity\Post $post
     */
    public function getFirstPost()
    {
        if($this->posts->count() === 0){
            return null;
        }
        return $this->posts->first();
    }


    /**
     * Get lastPost
     *
     * @return \JFK\CommunityBundle\Entity\Post $post
     */
    public function getLastPost()
    {
        return $this->posts->last();
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Topic
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
}