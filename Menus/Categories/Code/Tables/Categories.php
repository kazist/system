<?php

namespace System\Menus\Categories\Code\Tables;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table(name="system_menus_categories")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Categories extends \Kazist\Table\BaseTable
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
     * @ORM\Column(name="alias", type="string", length=255, nullable=true)
     */
    protected $alias;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    protected $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="is_core", type="integer", length=11, nullable=true)
     */
    protected $is_core;

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=255, nullable=true)
     */
    protected $icon;

    /**
     * @var string
     *
     * @ORM\Column(name="home_link", type="string", length=255, nullable=true)
     */
    protected $home_link;

    /**
     * @var integer
     *
     * @ORM\Column(name="published", type="integer", length=11, nullable=true)
     */
    protected $published;

    /**
     * @var integer
     *
     * @ORM\Column(name="featured", type="integer", length=11, nullable=true)
     */
    protected $featured;

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
     * @return Categories
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
     * Set alias
     *
     * @param string $alias
     * @return Categories
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string 
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Categories
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set is_core
     *
     * @param integer $isCore
     * @return Categories
     */
    public function setIsCore($isCore)
    {
        $this->is_core = $isCore;

        return $this;
    }

    /**
     * Get is_core
     *
     * @return integer 
     */
    public function getIsCore()
    {
        return $this->is_core;
    }

    /**
     * Set icon
     *
     * @param string $icon
     * @return Categories
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string 
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * Set home_link
     *
     * @param string $homeLink
     * @return Categories
     */
    public function setHomeLink($homeLink)
    {
        $this->home_link = $homeLink;

        return $this;
    }

    /**
     * Get home_link
     *
     * @return string 
     */
    public function getHomeLink()
    {
        return $this->home_link;
    }

    /**
     * Set published
     *
     * @param integer $published
     * @return Categories
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
     * Set featured
     *
     * @param integer $featured
     * @return Categories
     */
    public function setFeatured($featured)
    {
        $this->featured = $featured;

        return $this;
    }

    /**
     * Get featured
     *
     * @return integer 
     */
    public function getFeatured()
    {
        return $this->featured;
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
