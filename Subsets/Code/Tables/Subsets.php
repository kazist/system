<?php

namespace System\Subsets\Code\Tables;

use Doctrine\ORM\Mapping as ORM;

/**
 * Subsets
 *
 * @ORM\Table(name="system_subsets", indexes={@ORM\Index(name="extension_id_index", columns={"extension_id"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Subsets extends \Kazist\Table\BaseTable
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
     * @ORM\Column(name="extension_id", type="integer", length=11, nullable=false)
     */
    protected $extension_id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    protected $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="version", type="integer", length=11, nullable=true)
     */
    protected $version;

    /**
     * @var integer
     *
     * @ORM\Column(name="has_view", type="integer", length=11, nullable=true)
     */
    protected $has_view;

    /**
     * @var string
     *
     * @ORM\Column(name="explanation", type="string", length=255, nullable=true)
     */
    protected $explanation;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    protected $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="is_processed", type="integer", length=11, nullable=true)
     */
    protected $is_processed;

    /**
     * @var integer
     *
     * @ORM\Column(name="offset", type="integer", length=11, nullable=true)
     */
    protected $offset;

    /**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length=255, nullable=true)
     */
    protected $path;

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
     * Set extension_id
     *
     * @param integer $extensionId
     * @return Subsets
     */
    public function setExtensionId($extensionId)
    {
        $this->extension_id = $extensionId;

        return $this;
    }

    /**
     * Get extension_id
     *
     * @return integer 
     */
    public function getExtensionId()
    {
        return $this->extension_id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Subsets
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Subsets
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
     * Set version
     *
     * @param integer $version
     * @return Subsets
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return integer 
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set has_view
     *
     * @param integer $hasView
     * @return Subsets
     */
    public function setHasView($hasView)
    {
        $this->has_view = $hasView;

        return $this;
    }

    /**
     * Get has_view
     *
     * @return integer 
     */
    public function getHasView()
    {
        return $this->has_view;
    }

    /**
     * Set explanation
     *
     * @param string $explanation
     * @return Subsets
     */
    public function setExplanation($explanation)
    {
        $this->explanation = $explanation;

        return $this;
    }

    /**
     * Get explanation
     *
     * @return string 
     */
    public function getExplanation()
    {
        return $this->explanation;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Subsets
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
     * Set is_processed
     *
     * @param integer $isProcessed
     * @return Subsets
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
     * Set offset
     *
     * @param integer $offset
     * @return Subsets
     */
    public function setOffset($offset)
    {
        $this->offset = $offset;

        return $this;
    }

    /**
     * Get offset
     *
     * @return integer 
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * Set path
     *
     * @param string $path
     * @return Subsets
     */
    public function setPath($path)
    {
        $this->path = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return string 
     */
    public function getPath()
    {
        return $this->path;
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
