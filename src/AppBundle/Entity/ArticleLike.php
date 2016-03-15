<?php

namespace AppBundle\Entity;

/**
 * ArticleLike
 */
class ArticleLike
{
    /**
     * @var integer
     */
    private $userId;

    /**
     * @var integer
     */
    private $articleId;

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
     * Set userId
     *
     * @param integer $userId
     *
     * @return ArticleLike
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
     * Set articleId
     *
     * @param integer $articleId
     *
     * @return ArticleLike
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
     * Set createdTime
     *
     * @param \DateTime $createdTime
     *
     * @return ArticleLike
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
     * @return ArticleLike
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
     * @return ArticleLike
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
     * @return ArticleLike
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

