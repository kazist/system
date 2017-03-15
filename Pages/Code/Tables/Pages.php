<?php

namespace System\Pages\Code\Tables;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pages
 *
 * @ORM\Table(name="system_pages")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Pages extends \Kazist\Table\BaseTable
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text", nullable=false)
     */
    protected $content;

    /**
     * @var string
     *
     * @ORM\Column(name="route", type="string", length=255, nullable=false)
     */
    protected $route;

    /**
     * @var string
     *
     * @ORM\Column(name="keywords", type="string", length=255, nullable=false)
     */
    protected $keywords;

    /**
     * @var string
     *
     * @ORM\Column(name="unique_name", type="string", length=255, nullable=false)
     */
    protected $unique_name;

    /**
     * @var integer
     *
     * @ORM\Column(name="published", type="integer", length=11, nullable=false)
     */
    protected $published;

    /**
     * @var integer
     *
     * @ORM\Column(name="created_by", type="integer", length=11, nullable=false)
     */
    protected $created_by;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=false)
     */
    protected $date_created;

    /**
     * @var integer
     *
     * @ORM\Column(name="modified_by", type="integer", length=11, nullable=false)
     */
    protected $modified_by;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=false)
     */
    protected $date_modified;


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
     * @return Pages
     */
    public function setTitle($title)
    {
        $this->title = $title;

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
     * Set content
     *
     * @param string $content
     * @return Pages
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
     * Set route
     *
     * @param string $route
     * @return Pages
     */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Get route
     *
     * @return string 
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Set keywords
     *
     * @param string $keywords
     * @return Pages
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get keywords
     *
     * @return string 
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set unique_name
     *
     * @param string $uniqueName
     * @return Pages
     */
    public function setUniqueName($uniqueName)
    {
        $this->unique_name = $uniqueName;

        return $this;
    }

    /**
     * Get unique_name
     *
     * @return string 
     */
    public function getUniqueName()
    {
        return $this->unique_name;
    }

    /**
     * Set published
     *
     * @param integer $published
     * @return Pages
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return integer 
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Get created_by
     *
     * @return integer 
     */
    public function getCreatedBy()
    {
        return $this->created_by;
    }

    /**
     * Get date_created
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->date_created;
    }

    /**
     * Get modified_by
     *
     * @return integer 
     */
    public function getModifiedBy()
    {
        return $this->modified_by;
    }

    /**
     * Get date_modified
     *
     * @return \DateTime 
     */
    public function getDateModified()
    {
        return $this->date_modified;
    }
    /**
     * @ORM\PreUpdate
     */
    public function onPreUpdate()
    {
        // Add your code here
    }
}
