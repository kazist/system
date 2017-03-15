<?php

namespace System\Languages\Code\Tables;

use Doctrine\ORM\Mapping as ORM;

/**
 * Languages
 *
 * @ORM\Table(name="system_languages", indexes={@ORM\Index(name="subset_id_index", columns={"subset_id"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Languages extends \Kazist\Table\BaseTable
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
     * @ORM\Column(name="file_path", type="string", length=255, nullable=false)
     */
    protected $file_path;

    /**
     * @var integer
     *
     * @ORM\Column(name="subset_id", type="integer", length=11, nullable=true)
     */
    protected $subset_id;

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
     * Set file_path
     *
     * @param string $filePath
     * @return Languages
     */
    public function setFilePath($filePath)
    {
        $this->file_path = $filePath;

        return $this;
    }

    /**
     * Get file_path
     *
     * @return string 
     */
    public function getFilePath()
    {
        return $this->file_path;
    }

    /**
     * Set subset_id
     *
     * @param integer $subsetId
     * @return Languages
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
