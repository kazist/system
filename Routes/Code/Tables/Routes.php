<?php

namespace System\Routes\Code\Tables;

use Doctrine\ORM\Mapping as ORM;

/**
 * Routes
 *
 * @ORM\Table(name="system_routes", indexes={@ORM\Index(name="subset_id_index", columns={"subset_id"}), @ORM\Index(name="controller_index", columns={"controller"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Routes extends \Kazist\Table\BaseTable
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
     * @var integer
     *
     * @ORM\Column(name="subset_id", type="integer", length=11, nullable=true)
     */
    protected $subset_id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    protected $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    protected $description;

    /**
     * @var string
     *
     * @ORM\Column(name="viewside", type="string", length=255, nullable=true)
     */
    protected $viewside;

    /**
     * @var string
     *
     * @ORM\Column(name="unique_name", type="string", length=255, nullable=true, unique=true)
     */
    protected $unique_name;

    /**
     * @var string
     *
     * @ORM\Column(name="controller", type="string", length=255, nullable=true)
     */
    protected $controller;

    /**
     * @var string
     *
     * @ORM\Column(name="route", type="string", length=255, nullable=true)
     */
    protected $route;

    /**
     * @var string
     *
     * @ORM\Column(name="arguments", type="string", length=255, nullable=true)
     */
    protected $arguments;

    /**
     * @var string
     *
     * @ORM\Column(name="seo_url", type="string", length=255, nullable=true)
     */
    protected $seo_url;

    /**
     * @var string
     *
     * @ORM\Column(name="seo_arguments", type="string", length=255, nullable=true)
     */
    protected $seo_arguments;

    /**
     * @var string
     *
     * @ORM\Column(name="keywords", type="string", length=255, nullable=true)
     */
    protected $keywords;

    /**
     * @var string
     *
     * @ORM\Column(name="changefreq", type="string", length=255, nullable=true)
     */
    protected $changefreq;

    /**
     * @var string
     *
     * @ORM\Column(name="priority", type="string", length=255, nullable=true)
     */
    protected $priority;

    /**
     * @var integer
     *
     * @ORM\Column(name="login_required", type="integer", length=11, nullable=true)
     */
    protected $login_required;

    /**
     * @var string
     *
     * @ORM\Column(name="extension_path", type="string", length=255, nullable=false)
     */
    protected $extension_path;

    /**
     * @var integer
     *
     * @ORM\Column(name="published", type="integer", length=11, nullable=true)
     */
    protected $published;

    /**
     * @var integer
     *
     * @ORM\Column(name="is_processed", type="integer", length=11, nullable=true)
     */
    protected $is_processed;

    /**
     * @var string
     *
     * @ORM\Column(name="permissions", type="string", length=255, nullable=true)
     */
    protected $permissions;

    /**
     * @var integer
     *
     * @ORM\Column(name="created_by", type="integer", length=11, nullable=true)
     */
    protected $created_by;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_created", type="datetime", nullable=true)
     */
    protected $date_created;

    /**
     * @var integer
     *
     * @ORM\Column(name="modified_by", type="integer", length=11, nullable=true)
     */
    protected $modified_by;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=true)
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
     * Set subset_id
     *
     * @param integer $subsetId
     * @return Routes
     */
    public function setSubsetId($subsetId)
    {
        $this->subset_id = $subsetId;

        return $this;
    }

    /**
     * Get subset_id
     *
     * @return integer 
     */
    public function getSubsetId()
    {
        return $this->subset_id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Routes
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
     * Set description
     *
     * @param string $description
     * @return Routes
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
     * Set viewside
     *
     * @param string $viewside
     * @return Routes
     */
    public function setViewside($viewside)
    {
        $this->viewside = $viewside;

        return $this;
    }

    /**
     * Get viewside
     *
     * @return string 
     */
    public function getViewside()
    {
        return $this->viewside;
    }

    /**
     * Set unique_name
     *
     * @param string $uniqueName
     * @return Routes
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
     * Set controller
     *
     * @param string $controller
     * @return Routes
     */
    public function setController($controller)
    {
        $this->controller = $controller;

        return $this;
    }

    /**
     * Get controller
     *
     * @return string 
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * Set route
     *
     * @param string $route
     * @return Routes
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
     * Set arguments
     *
     * @param string $arguments
     * @return Routes
     */
    public function setArguments($arguments)
    {
        $this->arguments = $arguments;

        return $this;
    }

    /**
     * Get arguments
     *
     * @return string 
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * Set seo_url
     *
     * @param string $seoUrl
     * @return Routes
     */
    public function setSeoUrl($seoUrl)
    {
        $this->seo_url = $seoUrl;

        return $this;
    }

    /**
     * Get seo_url
     *
     * @return string 
     */
    public function getSeoUrl()
    {
        return $this->seo_url;
    }

    /**
     * Set seo_arguments
     *
     * @param string $seoArguments
     * @return Routes
     */
    public function setSeoArguments($seoArguments)
    {
        $this->seo_arguments = $seoArguments;

        return $this;
    }

    /**
     * Get seo_arguments
     *
     * @return string 
     */
    public function getSeoArguments()
    {
        return $this->seo_arguments;
    }

    /**
     * Set keywords
     *
     * @param string $keywords
     * @return Routes
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
     * Set changefreq
     *
     * @param string $changefreq
     * @return Routes
     */
    public function setChangefreq($changefreq)
    {
        $this->changefreq = $changefreq;

        return $this;
    }

    /**
     * Get changefreq
     *
     * @return string 
     */
    public function getChangefreq()
    {
        return $this->changefreq;
    }

    /**
     * Set priority
     *
     * @param string $priority
     * @return Routes
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return string 
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set login_required
     *
     * @param integer $loginRequired
     * @return Routes
     */
    public function setLoginRequired($loginRequired)
    {
        $this->login_required = $loginRequired;

        return $this;
    }

    /**
     * Get login_required
     *
     * @return integer 
     */
    public function getLoginRequired()
    {
        return $this->login_required;
    }

    /**
     * Set extension_path
     *
     * @param string $extensionPath
     * @return Routes
     */
    public function setExtensionPath($extensionPath)
    {
        $this->extension_path = $extensionPath;

        return $this;
    }

    /**
     * Get extension_path
     *
     * @return string 
     */
    public function getExtensionPath()
    {
        return $this->extension_path;
    }

    /**
     * Set published
     *
     * @param integer $published
     * @return Routes
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
     * Set is_processed
     *
     * @param integer $isProcessed
     * @return Routes
     */
    public function setIsProcessed($isProcessed)
    {
        $this->is_processed = $isProcessed;

        return $this;
    }

    /**
     * Get is_processed
     *
     * @return integer 
     */
    public function getIsProcessed()
    {
        return $this->is_processed;
    }

    /**
     * Set permissions
     *
     * @param string $permissions
     * @return Routes
     */
    public function setPermissions($permissions)
    {
        $this->permissions = $permissions;

        return $this;
    }

    /**
     * Get permissions
     *
     * @return string 
     */
    public function getPermissions()
    {
        return $this->permissions;
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
