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


class UpdateContentObject
{
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
    private $_fullText;

    /**
     * @var int
     */
    private $_catId;

    /**
     * @var int
     */
    private $_state;

    /**
     * @var int
     */
    private $_access;

    /**
     * @var string
     */
    private $_language;

    /**
     * @var string
     */
    private $_createdByAlias;

    /**
     * @var string
     */
    private $_robots;

    /**
     * @var string
     */
    private $_author;

    /**
     * @var string
     */
    private $_rights;

    /**
     * @var string
     */
    private $_xReference;

    /**
     * @var array
     */
    private $_requestParams;

    /**
     * @return array
     */
    public function getRequestParams()
    {
        if (empty($this->_requestParams)) {
            $response = [];
            (empty($this->getTitle())) ?: $response['title'] = $this->getTitle();
            (empty($this->getAlias())) ?: $response['alias'] = $this->getAlias();
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
            $this->_requestParams = $response;
        }
        return $this->_requestParams;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @param string $pTitle
     */
    public function setTitle($pTitle)
    {
        $this->_title = $pTitle;
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
     * @return string
     */
    public function getIntroText()
    {
        return $this->_introText;
    }

    /**
     * @param string $pIntroText
     */
    public function setIntroText($pIntroText)
    {
        $this->_introText = $pIntroText;
    }

    /**
     * @return string
     */
    public function getFullText()
    {
        return $this->_fullText;
    }

    /**
     * @param string $pFullText
     */
    public function setFullText($pFullText)
    {
        $this->_fullText = $pFullText;
    }

    /**
     * @return int
     */
    public function getCatId()
    {
        return $this->_catId;
    }

    /**
     * @param int $pCatId
     */
    public function setCatId($pCatId)
    {
        $this->_catId = $pCatId;
    }

    /**
     * @return string
     */
    public function getCreatedByAlias()
    {
        return $this->_createdByAlias;
    }

    /**
     * @param string $pCreatedByAlias
     */
    public function setCreatedByAlias($pCreatedByAlias)
    {
        $this->_createdByAlias = $pCreatedByAlias;
    }

    /**
     * @return int
     */
    public function getState()
    {
        return $this->_state;
    }

    /**
     * @param int $pState
     */
    public function setState($pState)
    {
        $this->_state = $pState;
    }

    /**
     * @return int
     */
    public function getAccess()
    {
        return $this->_access;
    }

    /**
     * @param int $pAccess
     */
    public function setAccess($pAccess)
    {
        $this->_access = $pAccess;
    }

    /**
     * @return string
     */
    public function getRobots()
    {
        return $this->_robots;
    }

    /**
     * @param string $pRobots
     */
    public function setRobots($pRobots)
    {
        $this->_robots = $pRobots;
    }

    /**
     * @return string
     */
    public function getAuthor()
    {
        return $this->_author;
    }

    /**
     * @param string $pAuthor
     */
    public function setAuthor($pAuthor)
    {
        $this->_author = $pAuthor;
    }

    /**
     * @return string
     */
    public function getRights()
    {
        return $this->_rights;
    }

    /**
     * @param string $pRights
     */
    public function setRights($pRights)
    {
        $this->_rights = $pRights;
    }

    /**
     * @return string
     */
    public function getXReference()
    {
        return $this->_xReference;
    }

    /**
     * @param string $pXReference
     */
    public function setXReference($pXReference)
    {
        $this->_xReference = $pXReference;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->_language;
    }

    /**
     * @param string $pLanguage
     */
    public function setLanguage($pLanguage)
    {
        $this->_language = $pLanguage;
    }
}