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


class CreateContentObject
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
    private $_introText = '';

    /**
     * @var string
     */
    private $_fullText = '';

    /**
     * @var int
     */
    private $_catId = 0;

    /**
     * @var int
     */
    private $_state = StateObject::STATE_UNPUBLISHED;

    /**
     * @var int
     */
    private $_access = 1;

    /**
     * @var string
     */
    private $_language = '*';

    /**
     * @var string
     */
    private $_createdByAlias = '';

    /**
     * @var string
     */
    private $_robots = '';

    /**
     * @var string
     */
    private $_author = '';

    /**
     * @var string
     */
    private $_rights = '';

    /**
     * @var string
     */
    private $_xReference = '';

    /**
     * @var array
     */
    private $_requestParams;

    /**
     * CreateContentObject constructor.
     *
     * @param string $pTitle
     */
    public function __construct($pTitle)
    {
        $this->_title = $pTitle;
    }

    public static function checkArguments($additionalArguments)
    {
        $vars = [
            'title',
            'introtext',
            'fulltext',
            'catid',
            'created_by_alias',
            'state',
            'access',
            'robots',
            'author',
            'rights',
            'xreference',
            'language'
        ];
        foreach ($vars as $pValue) {
            if (!array_key_exists($pValue, $additionalArguments)) {
                return false;
            }
        }
        return true;
    }

    /**
     * @return array
     */
    public function getRequestParams()
    {
        if (empty($this->_requestParams)) {
            $this->_requestParams = [
                'title' => $this->getTitle(),
                'alias' => $this->getAlias(),
                'introtext' => $this->getIntroText(),
                'fulltext' => $this->getFullText(),
                'catid' => $this->getCatId(),
                'created_by_alias' => $this->getCreatedByAlias(),
                'state' => $this->getState(),
                'access' => $this->getAccess(),
                'robots' => $this->getRobots(),
                'author' => $this->getAuthor(),
                'rights' => $this->getRights(),
                'xreference' => $this->getXReference(),
                'language' => $this->getLanguage(),
            ];
        }
        return $this->_requestParams;
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
        if (empty($this->_alias)) {
            $this->_alias = $this->_title;
        }
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
     * @return mixed
     */
    public function getFullText()
    {
        return $this->_fullText;
    }

    /**
     * @param string $pText
     */
    public function setFullText($pText)
    {
        $this->_fullText = $pText;
    }

    /**
     * @return mixed
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
    public function getState()
    {
        return $this->_state;
    }

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
     * @param int $pAccess
     */
    public function setAccess($pAccess)
    {
        $this->_access = $pAccess;
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
     * @return mixed
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