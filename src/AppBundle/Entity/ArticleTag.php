<?php

namespace AppBundle\Entity;

/**
 * ArticleTag
 */
class ArticleTag
{
    /**
     * @var integer
     */
    private $articleId;

    /**
     * @var integer
     */
    private $tagId;

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
     * Set articleId
     *
     * @param integer $articleId
     *
     * @return ArticleTag
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
     * Set tagId
     *
     * @param integer $tagId
     *
     * @return ArticleTag
     */
    public function setTagId($tagId)
    {
        $this->tagId = $tagId;

        return $this;
    }

    /**
     * Get tagId
     *
     * @return integer
     */
    public function getTagId()
    {
        return $this->tagId;
    }

    /**
     * Set createdTime
     *
     * @param \DateTime $createdTime
     *
     * @return ArticleTag
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
     * @return ArticleTag
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
     * @return ArticleTag
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
     * @return ArticleTag
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

