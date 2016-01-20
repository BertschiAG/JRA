<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: CategoryResponseObject.php
 * Date: 12.01.2016
 * Time: 14:40
 */

namespace JRA\Objects;


use JRA\Abstracts\AbstractResponseObject;

class CategoryResponseObject extends AbstractResponseObject
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
    private $_parentId;

    /**
     * @var string
     */
    private $_lft;

    /**
     * @var string
     */
    private $_rgt;

    /**
     * @var string
     */
    private $_level;

    /**
     * @var string
     */
    private $_extension;

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
    private $_description;

    /**
     * @var string
     */
    private $_published;

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
    private $_access;

    /**
     * @var string
     */
    private $_params;

    /**
     * @var string
     */
    private $_metaDesc;

    /**
     * @var string
     */
    private $_metaKey;

    /**
     * @var string
     */
    private $_metadata;

    /**
     * @var string
     */
    private $_createdUserId;

    /**
     * @var string
     */
    private $_createdTime;

    /**
     * @var string
     */
    private $_modifiedUserId;

    /**
     * @var string
     */
    private $_modifiedTime;

    /**
     * @var string
     */
    private $_hits;

    /**
     * @var string
     */
    private $_language;

    /**
     * @var string
     */
    private $_numItems;

    /**
     * @var string
     */
    private $_childrenNumItems;

    /**
     * @var string
     */
    private $_slug;

    /**
     * @var string
     */
    private $_assets;

    /**
     * @var string
     */
    private $_note;

    /**
     * @var string
     */
    private $_path;

    /**
     * @var string
     */
    private $_version;

    /**
     * @var CategoryResponseObject
     */
    private $_rightSibling;

    /**
     * Class specified parsing
     *
     * @return boolean
     */
    protected function _parse()
    {
        $this->_id = $this->_msg->id;
        $this->_assetId = $this->_msg->asset_id;
        $this->_parentId = $this->_msg->parent_id;
        $this->_lft = $this->_msg->lft;
        $this->_rgt = $this->_msg->rgt;
        $this->_level = $this->_msg->level;
        $this->_extension = $this->_msg->extension;
        $this->_title = $this->_msg->title;
        $this->_alias = $this->_msg->alias;
        $this->_description = $this->_msg->description;
        $this->_published = $this->_msg->published;
        $this->_checkedOut = $this->_msg->checked_out;
        $this->_checkedOutTime = $this->_msg->checked_out_time;
        $this->_access = $this->_msg->access;
        $this->_params = $this->_msg->params;
        $this->_metaDesc = $this->_msg->metadesc;
        $this->_metaKey = $this->_msg->metakey;
        $this->_metadata = $this->_msg->metadata;
        $this->_createdUserId = $this->_msg->created_user_id;
        $this->_createdTime = $this->_msg->created_time;
        $this->_modifiedUserId = $this->_msg->modified_user_id;
        $this->_modifiedTime = $this->_msg->modified_time;
        $this->_hits = $this->_msg->hits;
        $this->_language = $this->_msg->language;
        $this->_numItems = $this->_msg->numitems;
        $this->_childrenNumItems = $this->_msg->childrennumitems;
        $this->_slug = $this->_msg->slug;
        $this->_assets = $this->_msg->assets;
        $this->_note = $this->_msg->note;
        $this->_path = $this->_msg->path;
        $this->_version = $this->_msg->version;
        $this->_rightSibling = new CategoryResponseObject(json_encode($this->_msg['_rightsibling']));
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
    public function getParentId()
    {
        return $this->_parentId;
    }

    /**
     * @return string
     */
    public function getLft()
    {
        return $this->_lft;
    }

    /**
     * @return string
     */
    public function getRgt()
    {
        return $this->_rgt;
    }

    /**
     * @return string
     */
    public function getLevel()
    {
        return $this->_level;
    }

    /**
     * @return string
     */
    public function getExtension()
    {
        return $this->_extension;
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
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @return string
     */
    public function getPublished()
    {
        return $this->_published;
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
    public function getAccess()
    {
        return $this->_access;
    }

    /**
     * @return string
     */
    public function getParams()
    {
        return $this->_params;
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
    public function getMetaKey()
    {
        return $this->_metaKey;
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
    public function getCreatedUserId()
    {
        return $this->_createdUserId;
    }

    /**
     * @return string
     */
    public function getCreatedTime()
    {
        return $this->_createdTime;
    }

    /**
     * @return string
     */
    public function getModifiedUserId()
    {
        return $this->_modifiedUserId;
    }

    /**
     * @return string
     */
    public function getModifiedTime()
    {
        return $this->_modifiedTime;
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
    public function getLanguage()
    {
        return $this->_language;
    }

    /**
     * @return string
     */
    public function getNumItems()
    {
        return $this->_numItems;
    }

    /**
     * @return string
     */
    public function getChildrenNumItems()
    {
        return $this->_childrenNumItems;
    }

    /**
     * @return string
     */
    public function getSlug()
    {
        return $this->_slug;
    }

    /**
     * @return string
     */
    public function getAssets()
    {
        return $this->_assets;
    }

    /**
     * @return string
     */
    public function getNote()
    {
        return $this->_note;
    }

    /**
     * @return string
     */
    public function getPath()
    {
        return $this->_path;
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        return $this->_version;
    }

    /**
     * @return CategoryResponseObject
     */
    public function getRightSibling()
    {
        return $this->_rightSibling;
    }
}