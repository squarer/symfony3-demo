<?php

namespace AppBundle\Entity;

/**
 * Friends
 */
class Friends
{
    /**
     * @var integer
     */
    private $objectId;

    /**
     * @var integer
     */
    private $userOneId;

    /**
     * @var integer
     */
    private $userTwoId;

    /**
     * @var integer
     */
    private $actionUserId;

    /**
     * @var boolean
     */
    private $status;

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
     * Get objectId
     *
     * @return integer
     */
    public function getObjectId()
    {
        return $this->objectId;
    }

    /**
     * Set userOneId
     *
     * @param integer $userOneId
     *
     * @return Friends
     */
    public function setUserOneId($userOneId)
    {
        $this->userOneId = $userOneId;

        return $this;
    }

    /**
     * Get userOneId
     *
     * @return integer
     */
    public function getUserOneId()
    {
        return $this->userOneId;
    }

    /**
     * Set userTwoId
     *
     * @param integer $userTwoId
     *
     * @return Friends
     */
    public function setUserTwoId($userTwoId)
    {
        $this->userTwoId = $userTwoId;

        return $this;
    }

    /**
     * Get userTwoId
     *
     * @return integer
     */
    public function getUserTwoId()
    {
        return $this->userTwoId;
    }

    /**
     * Set actionUserId
     *
     * @param integer $actionUserId
     *
     * @return Friends
     */
    public function setActionUserId($actionUserId)
    {
        $this->actionUserId = $actionUserId;

        return $this;
    }

    /**
     * Get actionUserId
     *
     * @return integer
     */
    public function getActionUserId()
    {
        return $this->actionUserId;
    }

    /**
     * Set status
     *
     * @param boolean $status
     *
     * @return Friends
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
     * Set createdTime
     *
     * @param \DateTime $createdTime
     *
     * @return Friends
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
     * @return Friends
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
     * @return Friends
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
     * @return Friends
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

