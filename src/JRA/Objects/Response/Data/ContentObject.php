<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: ContentObject.php
 * Date: 20.01.2016
 * Time: 16:53
 */

namespace JRA\Objects\Response\Data;


use stdClass;

class ContentObject
{

    /**
     * @var string
     */
    private $_id;

    /**
     * @var string
     */
    private $_assetId;

    /**
     * @var string
     */
    private $_title;

    /**
     * @var string
     */
    private $_alias;

    /**
     * @var string
     */
    private $_introText;

    /**
     * @var string
     */
    private $_fulltext;

    /**
     * @var string
     */
    private $_state;

    /**
     * @var string
     */
    private $_catId;

    /**
     * @var string
     */
    private $_created;

    /**
     * @var string
     */
    private $_createdBy;

    /**
     * @var string
     */
    private $_createdByAlias;

    /**
     * @var string
     */
    private $_modified;

    /**
     * @var string
     */
    private $_modifiedBy;

    /**
     * @var string
     */
    private $_checkedOut;

    /**
     * @var string
     */
    private $_checkedOutTime;

    /**
     * @var string
     */
    private $_publishUp;

    /**
     * @var string
     */
    private $_publishDown;

    /**
     * @var string
     */
    private $_images;

    /**
     * @var string
     */
    private $_urls;

    /**
     * @var string
     */
    private $_attributes;

    /**
     * @var string
     */
    private $_version;

    /**
     * @var string
     */
    private $_ordering;

    /**
     * @var string
     */
    private $_metaKey;

    /**
     * @var string
     */
    private $_metaDesc;

    /**
     * @var string
     */
    private $_access;

    /**
     * @var string
     */
    private $_hits;

    /**
     * @var string
     */
    private $_metadata;

    /**
     * @var string
     */
    private $_featured;

    /**
     * @var string
     */
    private $_language;

    /**
     * @var string
     */
    private $_xReference;

    /**
     * ContentObject constructor.
     *
     * @param stdClass $pObject
     */
    public function __construct($pObject)
    {
        $this->_id = $pObject->id;
        $this->_assetId = $pObject->asset_id;
        $this->_title = $pObject->title;
        $this->_alias = $pObject->alias;
        $this->_introText = str_replace(array("\r", "\n", "\r\n"), '', $pObject->introtext);
        $this->_fulltext = $pObject->fulltext;
        $this->_state = $pObject->state;
        $this->_catId = $pObject->catid;
        $this->_created = $pObject->created;
        $this->_createdBy = $pObject->created_by;
        $this->_createdByAlias = $pObject->created_by_alias;
        $this->_modified = $pObject->modified;
        $this->_modifiedBy = $pObject->modified_by;
        $this->_checkedOut = $pObject->checked_out;
        $this->_checkedOutTime = $pObject->checked_out_time;
        $this->_publishUp = $pObject->publish_up;
        $this->_publishDown = $pObject->publish_down;
        $this->_images = $pObject->images;
        $this->_urls = $pObject->urls;
        $this->_attributes = $pObject->attribs;
        $this->_version = $pObject->version;
        $this->_ordering = $pObject->ordering;
        $this->_metaKey = $pObject->metakey;
        $this->_metaDesc = $pObject->metadesc;
        $this->_access = $pObject->access;
        $this->_hits = $pObject->hits;
        $this->_metadata = $pObject->metadata;
        $this->_featured = $pObject->featured;
        $this->_language = $pObject->language;
        $this->_xReference = $pObject->xreference;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return string
     */
    public function getAssetId()
    {
        return $this->_assetId;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @return string
     */
    public function getAlias()
    {
        return $this->_alias;
    }

    /**
     * @return string
     */
    public function getIntroText()
    {
        return $this->_introText;
    }

    /**
     * @return string
     */
    public function getFulltext()
    {
        return $this->_fulltext;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @return string
     */
    public function getCatId()
    {
        return $this->_catId;
    }

    /**
     * @return string
     */
    public function getCreated()
    {
        return $this->_created;
    }

    /**
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->_createdBy;
    }

    /**
     * @return string
     */
    public function getCreatedByAlias()
    {
        return $this->_createdByAlias;
    }

    /**
     * @return string
     */
    public function getModified()
    {
        return $this->_modified;
    }

    /**
     * @return string
     */
    public function getModifiedBy()
    {
        return $this->_modifiedBy;
    }

    /**
     * @return string
     */
    public function getCheckedOut()
    {
        return $this->_checkedOut;
    }

    /**
     * @return string
     */
    public function getCheckedOutTime()
    {
        return $this->_checkedOutTime;
    }

    /**
     * @return string
     */
    public function getPublishUp()
    {
        return $this->_publishUp;
    }

    /**
     * @return string
     */
    public function getPublishDown()
    {
        return $this->_publishDown;
    }

    /**
     * @return string
     */
    public function getImages()
    {
        return $this->_images;
    }

    /**
     * @return string
     */
    public function getUrls()
    {
        return $this->_urls;
    }

    /**
     * @return string
     */
    public function getAttributes()
    {
        return $this->_attributes;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->_version;
    }

    /**
     * @return string
     */
    public function getOrdering()
    {
        return $this->_ordering;
    }

    /**
     * @return string
     */
    public function getMetaKey()
    {
        return $this->_metaKey;
    }

    /**
     * @return string
     */
    public function getMetaDesc()
    {
        return $this->_metaDesc;
    }

    /**
     * @return string
     */
    public function getAccess()
    {
        return $this->_access;
    }

    /**
     * @return string
     */
    public function getHits()
    {
        return $this->_hits;
    }

    /**
     * @return string
     */
    public function getMetadata()
    {
        return $this->_metadata;
    }

    /**
     * @return string
     */
    public function getFeatured()
    {
        return $this->_featured;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->_language;
    }

    /**
     * @return string
     */
    public function getXReference()
    {
        return $this->_xReference;
    }
}