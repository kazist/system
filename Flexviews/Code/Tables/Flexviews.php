<?php

namespace System\Flexviews\Code\Tables;

use Doctrine\ORM\Mapping as ORM;

/**
 * Flexviews
 *
 * @ORM\Table(name="system_flexviews", indexes={@ORM\Index(name="unique_name_index", columns={"unique_name"}), @ORM\Index(name="extension_id_index", columns={"extension_id"})})
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
     * @var string
     *
     * @ORM\Column(name="unique_name", type="string", length=255, nullable=false)
     */
    protected $unique_name;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    protected $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="show_title", type="integer", length=11, nullable=false)
     */
    protected $show_title;

    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=255, nullable=true)
     */
    protected $icon;

    /**
     * @var integer
     *
     * @ORM\Column(name="homepage", type="integer", length=11, nullable=true)
     */
    protected $homepage;

    /**
     * @var integer
     *
     * @ORM\Column(name="allpages", type="integer", length=11, nullable=true)
     */
    protected $allpages;

    /**
     * @var integer
     *
     * @ORM\Column(name="extensionpages", type="integer", length=11, nullable=true)
     */
    protected $extensionpages;

    /**
     * @var string
     *
     * @ORM\Column(name="viewside", type="string", length=255, nullable=false)
     */
    protected $viewside;

    /**
     * @var string
     *
     * @ORM\Column(name="class", type="string", length=255, nullable=true)
     */
    protected $class;

    /**
     * @var string
     *
     * @ORM\Column(name="extension_path", type="string", length=255, nullable=true)
     */
    protected $extension_path;

    /**
     * @var integer
     *
     * @ORM\Column(name="extension_id", type="integer", length=11, nullable=false)
     */
    protected $extension_id;

    /**
     * @var string
     *
     * @ORM\Column(name="suffix_content", type="text", nullable=true)
     */
    protected $suffix_content;

    /**
     * @var string
     *
     * @ORM\Column(name="prefix_content", type="text", nullable=true)
     */
    protected $prefix_content;

    /**
     * @var string
     *
     * @ORM\Column(name="main_content", type="text", nullable=true)
     */
    protected $main_content;

    /**
     * @var integer
     *
     * @ORM\Column(name="version", type="integer", length=11, nullable=true)
     */
    protected $version;

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
     * @var string
     *
     * @ORM\Column(name="render", type="string", length=255, nullable=false)
     */
    protected $render;

    /**
     * @var string
     *
     * @ORM\Column(name="twig_file", type="string", length=255, nullable=true)
     */
    protected $twig_file;

    /**
     * @var integer
     *
     * @ORM\Column(name="ordering", type="integer", length=11, nullable=true)
     */
    protected $ordering;

    /**
     * @var integer
     *
     * @ORM\Column(name="published", type="integer", length=11, nullable=true)
     */
    protected $published;

    /**
     * @var string
     *
     * @ORM\Column(name="params", type="text", nullable=true)
     */
    protected $params;

    /**
     * @var string
     *
     * @ORM\Column(name="setting", type="text", nullable=true)
     */
    protected $setting;

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
     * Set unique_name
     *
     * @param string $uniqueName
     * @return Flexviews
     */
    public function setUniqueName($uniqueName) {
        $this->unique_name = $uniqueName;

        return $this;
    }

    /**
     * Get unique_name
     *
     * @return string 
     */
    public function getUniqueName() {
        return $this->unique_name;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Flexviews
     */
    public function setTitle($title) {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * Set show_title
     *
     * @param integer $showTitle
     * @return Flexviews
     */
    public function setShowTitle($showTitle) {
        $this->show_title = $showTitle;

        return $this;
    }

    /**
     * Get show_title
     *
     * @return integer 
     */
    public function getShowTitle() {
        return $this->show_title;
    }

    /**
     * Set icon
     *
     * @param string $icon
     * @return Flexviews
     */
    public function setIcon($icon) {
        $this->icon = $icon;

        return $this;
    }

    /**
     * Get icon
     *
     * @return string 
     */
    public function getIcon() {
        return $this->icon;
    }

    /**
     * Set homepage
     *
     * @param integer $homepage
     * @return Flexviews
     */
    public function setHomepage($homepage) {
        $this->homepage = $homepage;

        return $this;
    }

    /**
     * Get homepage
     *
     * @return integer 
     */
    public function getHomepage() {
        return $this->homepage;
    }

    /**
     * Set allpages
     *
     * @param integer $allpages
     * @return Flexviews
     */
    public function setAllpages($allpages) {
        $this->allpages = $allpages;

        return $this;
    }

    /**
     * Get allpages
     *
     * @return integer 
     */
    public function getAllpages() {
        return $this->allpages;
    }

    /**
     * Set extensionpages
     *
     * @param integer $extensionpages
     * @return Flexviews
     */
    public function setExtensionpages($extensionpages) {
        $this->extensionpages = $extensionpages;

        return $this;
    }

    /**
     * Get extensionpages
     *
     * @return integer 
     */
    public function getExtensionpages() {
        return $this->extensionpages;
    }

    /**
     * Set viewside
     *
     * @param string $viewside
     * @return Flexviews
     */
    public function setViewside($viewside) {
        $this->viewside = $viewside;

        return $this;
    }

    /**
     * Get viewside
     *
     * @return string 
     */
    public function getViewside() {
        return $this->viewside;
    }

    /**
     * Set class
     *
     * @param string $class
     * @return Flexviews
     */
    public function setClass($class) {
        $this->class = $class;

        return $this;
    }

    /**
     * Get class
     *
     * @return string 
     */
    public function getClass() {
        return $this->class;
    }

    /**
     * Set extension_path
     *
     * @param string $extensionPath
     * @return Flexviews
     */
    public function setExtensionPath($extensionPath) {
        $this->extension_path = $extensionPath;

        return $this;
    }

    /**
     * Get extension_path
     *
     * @return string 
     */
    public function getExtensionPath() {
        return $this->extension_path;
    }

    /**
     * Set extension_id
     *
     * @param integer $extensionId
     * @return Flexviews
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
     * Set suffix_content
     *
     * @param string $suffixContent
     * @return Flexviews
     */
    public function setSuffixContent($suffixContent) {
        $this->suffix_content = $suffixContent;

        return $this;
    }

    /**
     * Get suffix_content
     *
     * @return string 
     */
    public function getSuffixContent() {
        return $this->suffix_content;
    }

    /**
     * Set prefix_content
     *
     * @param string $prefixContent
     * @return Flexviews
     */
    public function setPrefixContent($prefixContent) {
        $this->prefix_content = $prefixContent;

        return $this;
    }

    /**
     * Get prefix_content
     *
     * @return string 
     */
    public function getPrefixContent() {
        return $this->prefix_content;
    }

    /**
     * Set main_content
     *
     * @param string $mainContent
     * @return Flexviews
     */
    public function setMainContent($mainContent) {
        $this->main_content = $mainContent;

        return $this;
    }

    /**
     * Get main_content
     *
     * @return string 
     */
    public function getMainContent() {
        return $this->main_content;
    }

    /**
     * Set version
     *
     * @param integer $version
     * @return Flexviews
     */
    public function setVersion($version) {
        $this->version = $version;

        return $this;
    }

    /**
     * Get version
     *
     * @return integer 
     */
    public function getVersion() {
        return $this->version;
    }

    /**
     * Set explanation
     *
     * @param string $explanation
     * @return Flexviews
     */
    public function setExplanation($explanation) {
        $this->explanation = $explanation;

        return $this;
    }

    /**
     * Get explanation
     *
     * @return string 
     */
    public function getExplanation() {
        return $this->explanation;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Flexviews
     */
    public function setDescription($description) {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set render
     *
     * @param string $render
     * @return Flexviews
     */
    public function setRender($render) {
        $this->render = $render;

        return $this;
    }

    /**
     * Get render
     *
     * @return string 
     */
    public function getRender() {
        return $this->render;
    }

    /**
     * Set twig_file
     *
     * @param string $twigFile
     * @return Flexviews
     */
    public function setTwigFile($twigFile) {
        $this->twig_file = $twigFile;

        return $this;
    }

    /**
     * Get twig_file
     *
     * @return string 
     */
    public function getTwigFile() {
        return $this->twig_file;
    }

    /**
     * Set ordering
     *
     * @param integer $ordering
     * @return Flexviews
     */
    public function setOrdering($ordering) {
        $this->ordering = $ordering;

        return $this;
    }

    /**
     * Get ordering
     *
     * @return integer 
     */
    public function getOrdering() {
        return $this->ordering;
    }

    /**
     * Set published
     *
     * @param integer $published
     * @return Flexviews
     */
    public function setPublished($published) {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return integer 
     */
    public function getPublished() {
        return $this->published;
    }

    /**
     * Set params
     *
     * @param string $params
     * @return Flexviews
     */
    public function setParams($params) {
        $this->params = $params;

        return $this;
    }

    /**
     * Get params
     *
     * @return string 
     */
    public function getParams() {
        return $this->params;
    }

    /**
     * Set setting
     *
     * @param string $setting
     * @return Flexviews
     */
    public function setSetting($setting) {
        $this->setting = $setting;

        return $this;
    }

    /**
     * Get setting
     *
     * @return string 
     */
    public function getSetting() {
        return $this->setting;
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
