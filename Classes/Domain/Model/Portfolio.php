<?php
namespace C1\C1Portfolio\Domain\Model;

/* * *************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Manuel Munz <t3dev@comuno.net>, comuno.net
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 * ************************************************************* */

/**
 * Portfolio
 */
class Portfolio extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * media
     *
     * @var array
     */
    protected $media = array();
    
    /**
     * title
     *
     * @var string
     */
    protected $title = '';
    
    /**
     * descshort
     *
     * @var string
     */
    protected $descshort = '';
    
    /**
     * description
     *
     * @var string
     */
    protected $description = '';
    
    /**
     * date
     *
     * @var \DateTime
     */
    protected $date = null;
    
    /**
     * url
     *
     * @var string
     */
    protected $url = '';
    
    /**
     * images
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    protected $images = null;
    
    /**
     * featured
     *
     * @var bool
     */
    protected $featured = false;
    
    /**
     * customer
     *
     * @var \C1\C1Portfolio\Domain\Model\Customer
     */
    protected $customer = null;
    
    /**
     * tags
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\C1\C1Portfolio\Domain\Model\Tag>
     */
    protected $tags = null;
    
    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    /**
     * Returns the descshort
     *
     * @return string $descshort
     */
    public function getDescshort()
    {
        return $this->descshort;
    }
    
    /**
     * Sets the descshort
     *
     * @param string $descshort
     * @return void
     */
    public function setDescshort($descshort)
    {
        $this->descshort = $descshort;
    }
    
    /**
     * Returns the description
     *
     * @return string $description
     */
    public function getDescription()
    {
        return $this->description;
    }
    
    /**
     * Sets the description
     *
     * @param string $description
     * @return void
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    /**
     * Returns the date
     *
     * @return \DateTime $date
     */
    public function getDate()
    {
        return $this->date;
    }
    
    /**
     * Sets the date
     *
     * @param \DateTime $date
     * @return void
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }
    
    /**
     * Returns the url
     *
     * @return string $url
     */
    public function getUrl()
    {
        return $this->url;
    }
    
    /**
     * Sets the url
     *
     * @param string $url
     * @return void
     */
    public function setUrl($url)
    {
        $this->url = $url;
    }
    
    /**
     * Returns the images
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference $images
     */
    public function getImages()
    {
        return $this->images;
    }
    
    /**
     * Sets the images
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $images
     * @return void
     */
    public function setImages(\TYPO3\CMS\Extbase\Domain\Model\FileReference $images)
    {
        $this->images = $images;
    }
    
    /**
     * Returns the featured
     *
     * @return bool $featured
     */
    public function getFeatured()
    {
        return $this->featured;
    }
    
    /**
     * Sets the featured
     *
     * @param bool $featured
     * @return void
     */
    public function setFeatured($featured)
    {
        $this->featured = $featured;
    }
    
    /**
     * Returns the boolean state of featured
     *
     * @return bool
     */
    public function isFeatured()
    {
        return $this->featured;
    }
    
    /**
     * Returns the customer
     *
     * @return \C1\C1Portfolio\Domain\Model\Customer $customer
     */
    public function getCustomer()
    {
        return $this->customer;
    }
    
    /**
     * Sets the customer
     *
     * @param \C1\C1Portfolio\Domain\Model\Customer $customer
     * @return void
     */
    public function setCustomer(\C1\C1Portfolio\Domain\Model\Customer $customer)
    {
        $this->customer = $customer;
    }
    
    /**
     * __construct
     */
    public function __construct()
    {
        //Do not remove the next line: It would break the functionality
        $this->initStorageObjects();
    }
    
    /**
     * Initializes all ObjectStorage properties
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    protected function initStorageObjects()
    {
        $this->tags = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }
    
    /**
     * Adds a Tag
     *
     * @param \C1\C1Portfolio\Domain\Model\Tag $tag
     * @return void
     */
    public function addTag(\C1\C1Portfolio\Domain\Model\Tag $tag)
    {
        $this->tags->attach($tag);
    }
    
    /**
     * Removes a Tag
     *
     * @param \C1\C1Portfolio\Domain\Model\Tag $tagToRemove The Tag to be removed
     * @return void
     */
    public function removeTag(\C1\C1Portfolio\Domain\Model\Tag $tagToRemove)
    {
        $this->tags->detach($tagToRemove);
    }
    
    /**
     * Returns the media objects
     *
     * @return array
     */
    public function getMedia()
    {
        return $this->media;
    }
    
    /**
     * set media objects
     *
     * @param $files
     * @return array $fileObjects // array of TYPO3\CMS\Core\Resource\FileReference
     */
    public function setMedia($files)
    {
        $this->media = $files;
    }
    
    /**
     * Returns the tags
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\C1\C1Portfolio\Domain\Model\Tag> $tags
     */
    public function getTags()
    {
        return $this->tags;
    }
    
    /**
     * Sets the tags
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\C1\C1Portfolio\Domain\Model\Tag> $tags
     * @return void
     */
    public function setTags(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $tags)
    {
        $this->tags = $tags;
    }

}