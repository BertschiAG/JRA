<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: CreateContentObjectInterface.php
 * Date: 05.01.2016
 * Time: 15:13
 */

namespace JRA\Interfaces;


interface CreateContentObjectInterface
{
    public function __construct($pTitle, $pIntroText, $pFullText, $pCatId, $pState, $pAccess, $pLanguage);

    /**
     * @return mixed
     */
    public function getTitle();

    /**
     * @return mixed
     */
    public function getIntroText();

    /**
     * @return mixed
     */
    public function getFullText();

    /**
     * @return mixed
     */
    public function getCatId();

    /**
     * @return mixed
     */
    public function getState();

    /**
     * @return mixed
     */
    public function getAccess();

    /**
     * @return mixed
     */
    public function getLanguage();

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