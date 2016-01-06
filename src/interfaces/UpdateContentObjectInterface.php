<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: UpdateContentObjectInterface.php
 * Date: 05.01.2016
 * Time: 15:14
 */

namespace JRA\Interfaces;


interface UpdateContentObjectInterface
{
    /**
     * @return mixed
     */
    public function getTitle();

    /**
     * @param mixed $pTitle
     */
    public function setTitle($pTitle);

    /**
     * @return mixed
     */
    public function getIntroText();

    /**
     * @param mixed $pIntroText
     */
    public function setIntroText($pIntroText);

    /**
     * @return mixed
     */
    public function getFullText();

    /**
     * @param mixed $pFullText
     */
    public function setFullText($pFullText);

    /**
     * @return mixed
     */
    public function getCatId();

    /**
     * @param mixed $pCatId
     */
    public function setCatId($pCatId);

    /**
     * @return mixed
     */
    public function getState();

    /**
     * @param mixed $pState
     */
    public function setState($pState);

    /**
     * @return mixed
     */
    public function getAccess();

    /**
     * @param mixed $pAccess
     */
    public function setAccess($pAccess);

    /**
     * @return mixed
     */
    public function getLanguage();

    /**
     * @param mixed $pLanguage
     */
    public function setLanguage($pLanguage);

    /**
     * @return mixed
     */
    public function getAlias();

    /**
     * @param mixed $pAlias
     */
    public function setAlias($pAlias);

    /**
     * @return mixed
     */
    public function getCreatedByAlias();

    /**
     * @param mixed $pCreatedByAlias
     */
    public function setCreatedByAlias($pCreatedByAlias);

    /**
     * @return mixed
     */
    public function getRobots();

    /**
     * @param mixed $pRobots
     */
    public function setRobots($pRobots);

    /**
     * @return mixed
     */
    public function getAuthor();

    /**
     * @param mixed $pAuthor
     */
    public function setAuthor($pAuthor);

    /**
     * @return mixed
     */
    public function getRights();

    /**
     * @param mixed $pRights
     */
    public function setRights($pRights);

    /**
     * @return mixed
     */
    public function getXReference();

    /**
     * @param mixed $pXReference
     */
    public function setXReference($pXReference);
}