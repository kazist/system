<?php

namespace System\Flexviews\Positions\Code\Tables;

use Doctrine\ORM\Mapping as ORM;

/**
 * Positions
 *
 * @ORM\Table(name="system_flexviews_positions", indexes={@ORM\Index(name="position_index", columns={"position"}), @ORM\Index(name="flexview_id_index", columns={"flexview_id"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Positions extends \Kazist\Table\BaseTable {

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
     * @ORM\Column(name="position", type="string", length=255, nullable=false)
     */
    protected $position;

    /**
     * @var integer
     *
     * @ORM\Column(name="flexview_id", type="integer", length=11, nullable=false)
     */
    protected $flexview_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="created_by", type="integer", length=11, nullable=false)
     */
    protected $created_by;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_modified", type="datetime", nullable=false)
     */
    protected $date_modified;

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
     * Get id
     *
     * @return integer 
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set position
     *
     * @param string $position
     * @return Positions
     */
    public function setPosition($position) {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return string 
     */
    public function getPosition() {
        return $this->position;
    }

    /**
     * Set flexview_id
     *
     * @param integer $flexviewId
     * @return Positions
     */
    public function setFlexviewId($flexviewId) {
        $this->flexview_id = $flexviewId;

        return $this;
    }

    /**
     * Get flexview_id
     *
     * @return integer 
     */
    public function getFlexviewId() {
        return $this->flexview_id;
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
     * Get date_modified
     *
     * @return \DateTime 
     */
    public function getDateModified() {
        return $this->date_modified;
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

}
