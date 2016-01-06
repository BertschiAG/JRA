<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: CreateContentObject.php
 * Date: 05.01.2016
 * Time: 14:52
 */

namespace JRA\Objects;


use JRA\Interfaces\CreateContentObjectInterface;

class CreateContentObject implements CreateContentObjectInterface
{
    private $_title;
    private $_introText;
    private $_fullText;
    private $_catId;
    private $_state;
    private $_access;
    private $_language;

    private $_alias;
    private $_createdByAlias;
    private $_robots;
    private $_author;
    private $_rights;
    private $_xReference;

    public function __construct($pTitle, $pIntroText, $pFullText, $pCatId, $pState, $pAccess, $pLanguage)
    {
        $this->_title = $pTitle;
        $this->_introText = $pIntroText;
        $this->_fullText = $pFullText;
        $this->_catId = $pCatId;
        $this->_state = $pState;
        $this->_access = $pAccess;
        $this->_language = $pLanguage;
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
    public function getIntroText()
    {
        return $this->_introText;
    }

    /**
     * @return mixed
     */
    public function getFullText()
    {
        return $this->_fullText;
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
    public function getState()
    {
        return $this->_state;
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
    public function getLanguage()
    {
        return $this->_language;
    }

    /**
     * @return mixed
     */
    public function getAlias()
    {
        return $this->_alias;
    }

    /**
     * @param mixed $pAlias
     */
    public function setAlias($pAlias)
    {
        $this->_alias = $pAlias;
    }

    /**
     * @return mixed
     */
    public function getCreatedByAlias()
    {
        return $this->_createdByAlias;
    }

    /**
     * @param mixed $pCreatedByAlias
     */
    public function setCreatedByAlias($pCreatedByAlias)
    {
        $this->_createdByAlias = $pCreatedByAlias;
    }

    /**
     * @return mixed
     */
    public function getRobots()
    {
        return $this->_robots;
    }

    /**
     * @param mixed $pRobots
     */
    public function setRobots($pRobots)
    {
        $this->_robots = $pRobots;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->_author;
    }

    /**
     * @param mixed $pAuthor
     */
    public function setAuthor($pAuthor)
    {
        $this->_author = $pAuthor;
    }

    /**
     * @return mixed
     */
    public function getRights()
    {
        return $this->_rights;
    }

    /**
     * @param mixed $pRights
     */
    public function setRights($pRights)
    {
        $this->_rights = $pRights;
    }

    /**
     * @return mixed
     */
    public function getXReference()
    {
        return $this->_xReference;
    }

    /**
     * @param mixed $pXReference
     */
    public function setXReference($pXReference)
    {
        $this->_xReference = $pXReference;
    }
}