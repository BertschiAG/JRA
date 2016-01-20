<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: ContentResponseObject.php
 * Date: 13.01.2016
 * Time: 11:29
 */

namespace JRA\Objects;


use JRA\Abstracts\AbstractResponseObject;

class ContentResponseObject extends AbstractResponseObject
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
     * @var ContentResponseObject
     */
    private $_nextContent = null;

    /**
     * Class specified parsing
     *
     * @return boolean
     */
    protected function _parse()
    {
        $array = (array)$this->_msg;
        $object = (object)array_shift($array);
        $this->_msg = (object)$array;

        $this->_id = $object->id;
        $this->_assetId = $object->asset_id;
        $this->_title = $object->title;
        $this->_alias = $object->alias;
        $this->_introText = $object->introtext;
        $this->_fulltext = $object->fulltext;
        $this->_state = $object->state;
        $this->_catId = $object->catid;
        $this->_created = $object->created;
        $this->_createdBy = $object->created_by;
        $this->_createdByAlias = $object->created_by_alias;
        $this->_modified = $object->modified;
        $this->_modifiedBy = $object->modified_by;
        $this->_checkedOut = $object->checked_out;
        $this->_checkedOutTime = $object->checked_out_time;
        $this->_publishUp = $object->publish_up;
        $this->_publishDown = $object->publish_down;
        $this->_images = $object->images;
        $this->_urls = $object->urls;
        $this->_attributes = $object->attribs;
        $this->_version = $object->version;
        $this->_ordering = $object->ordering;
        $this->_metaKey = $object->metakey;
        $this->_metaDesc = $object->metadesc;
        $this->_access = $object->access;
        $this->_hits = $object->hits;
        $this->_metadata = $object->metadata;
        $this->_featured = $object->featured;
        $this->_language = $object->language;
        $this->_xReference = $object->xreference;

        if (count((array)$this->_msg) != 0) {
            $this->_nextContent = new ContentResponseObject(json_encode($this->_msg));
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @return mixed
     */
    public function getAssetId()
    {
        return $this->_assetId;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @return mixed
     */
    public function getAlias()
    {
        return $this->_alias;
    }

    /**
     * @return mixed
     */
    public function getIntroText()
    {
        return $this->_introText;
    }

    /**
     * @return mixed
     */
    public function getFulltext()
    {
        return $this->_fulltext;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @return mixed
     */
    public function getCatId()
    {
        return $this->_catId;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->_created;
    }

    /**
     * @return mixed
     */
    public function getCreatedBy()
    {
        return $this->_createdBy;
    }

    /**
     * @return mixed
     */
    public function getCreatedByAlias()
    {
        return $this->_createdByAlias;
    }

    /**
     * @return mixed
     */
    public function getModified()
    {
        return $this->_modified;
    }

    /**
     * @return mixed
     */
    public function getModifiedBy()
    {
        return $this->_modifiedBy;
    }

    /**
     * @return mixed
     */
    public function getCheckedOut()
    {
        return $this->_checkedOut;
    }

    /**
     * @return mixed
     */
    public function getCheckedOutTime()
    {
        return $this->_checkedOutTime;
    }

    /**
     * @return mixed
     */
    public function getPublishUp()
    {
        return $this->_publishUp;
    }

    /**
     * @return mixed
     */
    public function getPublishDown()
    {
        return $this->_publishDown;
    }

    /**
     * @return mixed
     */
    public function getImages()
    {
        return $this->_images;
    }

    /**
     * @return mixed
     */
    public function getUrls()
    {
        return $this->_urls;
    }

    /**
     * @return mixed
     */
    public function getAttributes()
    {
        return $this->_attributes;
    }

    /**
     * @return mixed
     */
    public function getVersion()
    {
        return $this->_version;
    }

    /**
     * @return mixed
     */
    public function getOrdering()
    {
        return $this->_ordering;
    }

    /**
     * @return mixed
     */
    public function getMetaKey()
    {
        return $this->_metaKey;
    }

    /**
     * @return mixed
     */
    public function getMetaDesc()
    {
        return $this->_metaDesc;
    }

    /**
     * @return mixed
     */
    public function getAccess()
    {
        return $this->_access;
    }

    /**
     * @return mixed
     */
    public function getHits()
    {
        return $this->_hits;
    }

    /**
     * @return mixed
     */
    public function getMetadata()
    {
        return $this->_metadata;
    }

    /**
     * @return mixed
     */
    public function getFeatured()
    {
        return $this->_featured;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->_language;
    }

    /**
     * @return mixed
     */
    public function getXReference()
    {
        return $this->_xReference;
    }
}