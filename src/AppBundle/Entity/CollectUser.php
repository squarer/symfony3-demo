<?php

namespace AppBundle\Entity;

/**
 * CollectUser
 *å
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CollectUserRepository")
 */
class CollectUser
{
    /**
     * @var integer
     */
    private $userId;

    /**
     * @var integer
     */
    private $collectUserId;

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

    public function __construct($userId, $collectUserId)
    {
        $now = new \DateTime();
        $this->createdTime = $now;
        $this->modifiedTime = $now;
        $this->userId = $userId;
        $this->collectUserId = $collectUserId;
        $this->lastestEditor = $userId;
        $this->isValid = true;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return CollectUser
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
     * Set collectUserId
     *
     * @param integer $collectUserId
     *
     * @return CollectUser
     */
    public function setCollectUserId($collectUserId)
    {
        $this->collectUserId = $collectUserId;

        return $this;
    }

    /**
     * Get collectUserId
     *
     * @return integer
     */
    public function getCollectUserId()
    {
        return $this->collectUserId;
    }

    /**
     * Set createdTime
     *
     * @param \DateTime $createdTime
     *
     * @return CollectUser
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
     * @return CollectUser
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
     * @return CollectUser
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
     * @return CollectUser
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
            'user_id' => $this->getUserId(),
            'collect_user_id' => $this->getCollectUserId(),
            'modified_time' => $this->getModifiedTime()
        ];
    }
}
