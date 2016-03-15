<?php

namespace AppBundle\Entity;

/**
 * ArticleImage
 */
class ArticleImage
{
    /**
     * @var integer
     */
    private $imageId;

    /**
     * @var integer
     */
    private $articleId;

    /**
     * @var string
     */
    private $featureImage;

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
     * Get imageId
     *
     * @return integer
     */
    public function getImageId()
    {
        return $this->imageId;
    }

    /**
     * Set articleId
     *
     * @param integer $articleId
     *
     * @return ArticleImage
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
     * Set featureImage
     *
     * @param string $featureImage
     *
     * @return ArticleImage
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
     * Set createdTime
     *
     * @param \DateTime $createdTime
     *
     * @return ArticleImage
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
     * @return ArticleImage
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
     * @return ArticleImage
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
     * @return ArticleImage
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
