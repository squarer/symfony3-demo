<?php

namespace AppBundle\Entity;

/**
 * Friends
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\FriendsRepository")
 */
class Friends
{
    /**
     * 等待中
     */
    const STATUS_PENDING = 0;

    /**
     * 已接受邀請
     */
    const STATUS_ACCEPTED = 1;

    /**
     * 已拒絕邀請
     */
    const STATUS_DECLINED = 2;

    /**
     * 已封鎖
     */
    const STATUS_BLOCKED = 3;

    /**
     * 初始狀態
     */
    const STATUS_INIT = 9;

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
     * @var integer
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

    public function __construct($userOneId, $userTwoId, $actionUserId)
    {
        $now = new \DateTime();
        $this->createdTime = $now;
        $this->modifiedTime = $now;
        $this->userOneId = $userOneId;
        $this->userTwoId = $userTwoId;
        $this->actionUserId = $actionUserId;
        $this->lastestEditor = $actionUserId;
        $this->isValid = true;
        $this->status = self::STATUS_INIT;
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
     * @param integer $status
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
     * @return integer
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
        return $this->createdTime->format(\DateTime::ISO8601);
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
        return $this->modifiedTime->format(\DateTime::ISO8601);
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

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'user_one_id' => $this->getUserOneId(),
            'user_two_id' => $this->getUserTwoId(),
            'action_user_id' => $this->getActionUserId(),
            'status' => $this->getStatus(),
            'modified_time' => $this->getModifiedTime()
        ];
    }
}
