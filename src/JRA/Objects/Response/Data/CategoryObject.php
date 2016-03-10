<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: CategoryObject.php
 * Date: 20.01.2016
 * Time: 16:42
 */

namespace JRA\Objects\Response\Data;


use stdClass;

class CategoryObject
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
     * @var CategoryObject
     */
    private $_rightSibling;

    /**
     * CategoryObject constructor.
     *
     * @param stdClass $pObject
     */
    public function __construct($pObject)
    {
        $this->_id = $pObject->id;
        $this->_assetId = $pObject->asset_id;
        $this->_parentId = $pObject->parent_id;
        $this->_lft = $pObject->lft;
        $this->_rgt = $pObject->rgt;
        $this->_level = $pObject->level;
        $this->_extension = $pObject->extension;
        $this->_title = $pObject->title;
        $this->_alias = $pObject->alias;
        $this->_description = $pObject->description;
        $this->_published = $pObject->published;
        $this->_checkedOut = $pObject->checked_out;
        $this->_checkedOutTime = $pObject->checked_out_time;
        $this->_access = $pObject->access;
        $this->_params = $pObject->params;
        $this->_metaDesc = $pObject->metadesc;
        $this->_metaKey = $pObject->metakey;
        $this->_metadata = $pObject->metadata;
        $this->_createdUserId = $pObject->created_user_id;
        $this->_createdTime = $pObject->created_time;
        $this->_modifiedUserId = $pObject->modified_user_id;
        $this->_modifiedTime = $pObject->modified_time;
        $this->_hits = $pObject->hits;
        $this->_language = $pObject->language;
        $this->_numItems = $pObject->numitems;
        $this->_childrenNumItems = $pObject->childrennumitems;
        $this->_slug = $pObject->slug;
        $this->_assets = $pObject->assets;
        $this->_note = $pObject->note;
        $this->_path = $pObject->path;
        $this->_version = $pObject->version;
        if (!empty($pObject->_rightsibling)) {
            $this->_rightSibling = new CategoryObject($pObject->_rightsibling);
        }
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
     * @return CategoryObject
     */
    public function getRightSibling()
    {
        return $this->_rightSibling;
    }
}