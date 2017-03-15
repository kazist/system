<?php

namespace System\Routes\Flexviews\Code\Tables;

use Doctrine\ORM\Mapping as ORM;

/**
 * Flexviews
 *
 * @ORM\Table(name="system_routes_flexviews", indexes={@ORM\Index(name="flexview_id_index", columns={"flexview_id"}), @ORM\Index(name="route_index", columns={"route"})})
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks
 */
class Flexviews extends \Kazist\Table\BaseTable {

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
     * @ORM\Column(name="flexview_id", type="integer", length=11, nullable=false)
     */
    protected $flexview_id;

    /**
     * @var string
     *
     * @ORM\Column(name="route", type="string", length=255, nullable=false)
     */
    protected $route;

    /**
     * @var integer
     *
     * @ORM\Column(name="visible", type="integer", length=11, nullable=true)
     */
    protected $visible;

    /**
     * @var integer
     *
     * @ORM\Column(name="hidden", type="integer", length=11, nullable=true)
     */
    protected $hidden;

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
    public function getId() {
        return $this->id;
    }

    /**
     * Set flexview_id
     *
     * @param integer $flexviewId
     * @return Flexviews
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
     * Set route
     *
     * @param string $route
     * @return Flexviews
     */
    public function setRoute($route) {
        $this->route = $route;

        return $this;
    }

    /**
     * Get route
     *
     * @return string 
     */
    public function getRoute() {
        return $this->route;
    }

    /**
     * Set visible
     *
     * @param integer $visible
     * @return Flexviews
     */
    public function setVisible($visible) {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get visible
     *
     * @return integer 
     */
    public function getVisible() {
        return $this->visible;
    }

    /**
     * Set hidden
     *
     * @param integer $hidden
     * @return Flexviews
     */
    public function setHidden($hidden) {
        $this->hidden = $hidden;

        return $this;
    }

    /**
     * Get hidden
     *
     * @return integer 
     */
    public function getHidden() {
        return $this->hidden;
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
