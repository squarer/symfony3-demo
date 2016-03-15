<?php

namespace AppBundle\Entity;

/**
 * Status
 */
class Status
{
    /**
     * @var integer
     */
    private $statusId;

    /**
     * @var integer
     */
    private $articleId;

    /**
     * @var integer
     */
    private $receiverId;

    /**
     * @var integer
     */
    private $userId;

    /**
     * @var integer
     */
    private $followUserId;

    /**
     * @var boolean
     */
    private $type;

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
    private $latestEditor;

    /**
     * @var boolean
     */
    private $isVaild;


    /**
     * Get statusId
     *
     * @return integer
     */
    public function getStatusId()
    {
        return $this->statusId;
    }

    /**
     * Set articleId
     *
     * @param integer $articleId
     *
     * @return Status
     */
    public function setArticleId($articleId)
    {
        $this->articleId = $articleId;

        return $this;
    }

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
     * Set receiverId
     *
     * @param integer $receiverId
     *
     * @return Status
     */
    public function setReceiverId($receiverId)
    {
        $this->receiverId = $receiverId;

        return $this;
    }

    /**
     * Get receiverId
     *
     * @return integer
     */
    public function getReceiverId()
    {
        return $this->receiverId;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return Status
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
     * Set followUserId
     *
     * @param integer $followUserId
     *
     * @return Status
     */
    public function setFollowUserId($followUserId)
    {
        $this->followUserId = $followUserId;

        return $this;
    }

    /**
     * Get followUserId
     *
     * @return integer
     */
    public function getFollowUserId()
    {
        return $this->followUserId;
    }

    /**
     * Set type
     *
     * @param boolean $type
     *
     * @return Status
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return boolean
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set createdTime
     *
     * @param \DateTime $createdTime
     *
     * @return Status
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
     * @return Status
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
     * Set latestEditor
     *
     * @param integer $latestEditor
     *
     * @return Status
     */
    public function setLatestEditor($latestEditor)
    {
        $this->latestEditor = $latestEditor;

        return $this;
    }

    /**
     * Get latestEditor
     *
     * @return integer
     */
    public function getLatestEditor()
    {
        return $this->latestEditor;
    }

    /**
     * Set isVaild
     *
     * @param boolean $isVaild
     *
     * @return Status
     */
    public function setIsVaild($isVaild)
    {
        $this->isVaild = $isVaild;

        return $this;
    }

    /**
     * Get isVaild
     *
     * @return boolean
     */
    public function getIsVaild()
    {
        return $this->isVaild;
    }
}

