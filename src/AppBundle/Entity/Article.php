<?php

namespace AppBundle\Entity;

/**
 * Article
 */
class Article
{
    /**
     * @var integer
     */
    private $articleId;

    /**
     * @var integer
     */
    private $userId;

    /**
     * @var string
     */
    private $title;

    /**
     * @var boolean
     */
    private $status;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $featureImage;

    /**
     * @var \DateTime
     */
    private $eventStartDate;

    /**
     * @var \DateTime
     */
    private $eventEndDate;

    /**
     * @var string
     */
    private $eventLocation;

    /**
     * @var string
     */
    private $eventOwner;

    /**
     * @var \DateTime
     */
    private $createdTime;

    /**
     * @var \DateTime
     */
    private $modifiedTime;

    /**
     * @var integer
     */
    private $lastestEditor;

    /**
     * @var boolean
     */
    private $isValid;


    /**
     * Get articleId
     *
     * @return integer
     */
    public function getArticleId()
    {
        return $this->articleId;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return Article
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Article
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
     * Set status
     *
     * @param boolean $status
     *
     * @return Article
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return Article
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
     * Set featureImage
     *
     * @param string $featureImage
     *
     * @return Article
     */
    public function setFeatureImage($featureImage)
    {
        $this->featureImage = $featureImage;

        return $this;
    }

    /**
     * Get featureImage
     *
     * @return string
     */
    public function getFeatureImage()
    {
        return $this->featureImage;
    }

    /**
     * Set eventStartDate
     *
     * @param \DateTime $eventStartDate
     *
     * @return Article
     */
    public function setEventStartDate($eventStartDate)
    {
        $this->eventStartDate = $eventStartDate;

        return $this;
    }

    /**
     * Get eventStartDate
     *
     * @return \DateTime
     */
    public function getEventStartDate()
    {
        return $this->eventStartDate;
    }

    /**
     * Set eventEndDate
     *
     * @param \DateTime $eventEndDate
     *
     * @return Article
     */
    public function setEventEndDate($eventEndDate)
    {
        $this->eventEndDate = $eventEndDate;

        return $this;
    }

    /**
     * Get eventEndDate
     *
     * @return \DateTime
     */
    public function getEventEndDate()
    {
        return $this->eventEndDate;
    }

    /**
     * Set eventLocation
     *
     * @param string $eventLocation
     *
     * @return Article
     */
    public function setEventLocation($eventLocation)
    {
        $this->eventLocation = $eventLocation;

        return $this;
    }

    /**
     * Get eventLocation
     *
     * @return string
     */
    public function getEventLocation()
    {
        return $this->eventLocation;
    }

    /**
     * Set eventOwner
     *
     * @param string $eventOwner
     *
     * @return Article
     */
    public function setEventOwner($eventOwner)
    {
        $this->eventOwner = $eventOwner;

        return $this;
    }

    /**
     * Get eventOwner
     *
     * @return string
     */
    public function getEventOwner()
    {
        return $this->eventOwner;
    }

    /**
     * Set createdTime
     *
     * @param \DateTime $createdTime
     *
     * @return Article
     */
    public function setCreatedTime($createdTime)
    {
        $this->createdTime = $createdTime;

        return $this;
    }

    /**
     * Get createdTime
     *
     * @return \DateTime
     */
    public function getCreatedTime()
    {
        return $this->createdTime;
    }

    /**
     * Set modifiedTime
     *
     * @param \DateTime $modifiedTime
     *
     * @return Article
     */
    public function setModifiedTime($modifiedTime)
    {
        $this->modifiedTime = $modifiedTime;

        return $this;
    }

    /**
     * Get modifiedTime
     *
     * @return \DateTime
     */
    public function getModifiedTime()
    {
        return $this->modifiedTime;
    }

    /**
     * Set lastestEditor
     *
     * @param integer $lastestEditor
     *
     * @return Article
     */
    public function setLastestEditor($lastestEditor)
    {
        $this->lastestEditor = $lastestEditor;

        return $this;
    }

    /**
     * Get lastestEditor
     *
     * @return integer
     */
    public function getLastestEditor()
    {
        return $this->lastestEditor;
    }

    /**
     * Set isValid
     *
     * @param boolean $isValid
     *
     * @return Article
     */
    public function setIsValid($isValid)
    {
        $this->isValid = $isValid;

        return $this;
    }

    /**
     * Get isValid
     *
     * @return boolean
     */
    public function getIsValid()
    {
        return $this->isValid;
    }
}
