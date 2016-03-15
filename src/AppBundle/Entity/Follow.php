<?php

namespace AppBundle\Entity;

/**
 * Follow
 */
class Follow
{
    /**
     * @var integer
     */
    private $followerId;

    /**
     * @var integer
     */
    private $followedId;

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
     * Set followerId
     *
     * @param integer $followerId
     *
     * @return Follow
     */
    public function setFollowerId($followerId)
    {
        $this->followerId = $followerId;

        return $this;
    }

    /**
     * Get followerId
     *
     * @return integer
     */
    public function getFollowerId()
    {
        return $this->followerId;
    }

    /**
     * Set followedId
     *
     * @param integer $followedId
     *
     * @return Follow
     */
    public function setFollowedId($followedId)
    {
        $this->followedId = $followedId;

        return $this;
    }

    /**
     * Get followedId
     *
     * @return integer
     */
    public function getFollowedId()
    {
        return $this->followedId;
    }

    /**
     * Set createdTime
     *
     * @param \DateTime $createdTime
     *
     * @return Follow
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
     * @return Follow
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
     * @return Follow
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
     * @return Follow
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

