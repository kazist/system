<?php

namespace System\Extensions\Updates\Code\Tables;

use Doctrine\ORM\Mapping as ORM;

/**
 * Updates
 *
 * @ORM\Table(name="system_extensions_updates")
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Updates extends \Kazist\Table\BaseTable {

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
     * @ORM\Column(name="version", type="string", length=255, nullable=false)
     */
    protected $version;

    /**
     * @var string
     *
     * @ORM\Column(name="change_log", type="text", nullable=false)
     */
    protected $change_log;

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
    public function getId() {
        return $this->id;
    }

    /**
     * Set extension_id
     *
     * @param integer $extensionId
     * @return Updates
     */
    public function setExtensionId($extensionId) {
        $this->extension_id = $extensionId;

        return $this;
    }

    /**
     * Get extension_id
     *
     * @return integer 
     */
    public function getExtensionId() {
        return $this->extension_id;
    }

    /**
     * Set version
     *
     * @param string $version
     * @return Updates
     */
    public function setVersion($version) {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return string 
     */
    public function getVersion() {
        return $this->version;
    }

    /**
     * Set change_log
     *
     * @param string $changeLog
     * @return Updates
     */
    public function setChangeLog($changeLog) {
        $this->change_log = $changeLog;

        return $this;
    }

    /**
     * Get change_log
     *
     * @return string 
     */
    public function getChangeLog() {
        return $this->change_log;
    }

    /**
     * Get created_by
     *
     * @return integer 
     */
    public function getCreatedBy() {
        return $this->created_by;
    }

    /**
     * Get date_created
     *
     * @return \DateTime 
     */
    public function getDateCreated() {
        return $this->date_created;
    }

    /**
     * Get modified_by
     *
     * @return integer 
     */
    public function getModifiedBy() {
        return $this->modified_by;
    }

    /**
     * Get date_modified
     *
     * @return \DateTime 
     */
    public function getDateModified() {
        return $this->date_modified;
    }

}
