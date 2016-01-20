<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: UpdateContentObject.php
 * Date: 05.01.2016
 * Time: 15:08
 */

namespace JRA\Objects;


use JRA\Interfaces\UpdateContentObjectInterface;

class UpdateContentObject implements UpdateContentObjectInterface
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

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @param mixed $pTitle
     */
    public function setTitle($pTitle)
    {
        $this->_title = $pTitle;
    }

    /**
     * @return mixed
     */
    public function getIntroText()
    {
        return $this->_introText;
    }

    /**
     * @param mixed $pIntroText
     */
    public function setIntroText($pIntroText)
    {
        $this->_introText = $pIntroText;
    }

    /**
     * @return mixed
     */
    public function getFullText()
    {
        return $this->_fullText;
    }

    /**
     * @param mixed $pFullText
     */
    public function setFullText($pFullText)
    {
        $this->_fullText = $pFullText;
    }

    /**
     * @return mixed
     */
    public function getCatId()
    {
        return $this->_catId;
    }

    /**
     * @param mixed $pCatId
     */
    public function setCatId($pCatId)
    {
        $this->_catId = $pCatId;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param mixed $pState
     */
    public function setState($pState)
    {
        $this->_state = $pState;
    }

    /**
     * @return mixed
     */
    public function getAccess()
    {
        return $this->_access;
    }

    /**
     * @param mixed $pAccess
     */
    public function setAccess($pAccess)
    {
        $this->_access = $pAccess;
    }

    /**
     * @return mixed
     */
    public function getLanguage()
    {
        return $this->_language;
    }

    /**
     * @param mixed $pLanguage
     */
    public function setLanguage($pLanguage)
    {
        $this->_language = $pLanguage;
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

    /**
     * @return array
     */
    public function getRequestParams()
    {
        $response = [];
        (empty($this->getTitle())) ?: $response['title'] = $this->getTitle();
        (empty($this->getIntroText())) ?: $response['introtext'] = $this->getIntroText();
        (empty($this->getFullText())) ?: $response['fulltext'] = $this->getFullText();
        (empty($this->getCatId())) ?: $response['catid'] = $this->getCatId();
        (empty($this->getCreatedByAlias())) ?: $response['created_by_alias'] = $this->getCreatedByAlias();
        (empty($this->getState())) ?: $response['state'] = $this->getState();
        (empty($this->getAccess())) ?: $response['access'] = $this->getAccess();
        (empty($this->getRobots())) ?: $response['robots'] = $this->getRobots();
        (empty($this->getAuthor())) ?: $response['author'] = $this->getAuthor();
        (empty($this->getRights())) ?: $response['rights'] = $this->getRights();
        (empty($this->getXReference())) ?: $response['xreference'] = $this->getXReference();
        (empty($this->getLanguage())) ?: $response['language'] = $this->getLanguage();
        return $response;
    }
}