<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: SessionObject.php
 * Date: 20.01.2016
 * Time: 15:38
 */

namespace JRA\Objects\Response\Data;


class SessionObject
{

    /**
     * @var string
     */
    private $_sessionId;

    /**
     * @var string
     */
    private $_clientId;

    /**
     * @var string
     */
    private $_guest;

    /**
     * @var string
     */
    private $_time;

    /**
     * @var string
     */
    private $_data;

    /**
     * @var string
     */
    private $_userId;

    /**
     * @var string
     */
    private $_username;

    /**
     * SessionObject constructor.
     *
     * @param stdClass
     */
    public function __construct($pObject)
    {
        $this->_sessionId = $pObject->session_id;
        $this->_clientId = $pObject->client_id;
        $this->_guest = $pObject->guest;
        $this->_time = $pObject->time;
        $this->_data = $pObject->data;
        $this->_userId = $pObject->userid;
        $this->_username = $pObject->username;
    }

    /**
     * @return string
     */
    public function getSessionId()
    {
        return $this->_sessionId;
    }

    /**
     * @return string
     */
    public function getClientId()
    {
        return $this->_clientId;
    }

    /**
     * @return string
     */
    public function getGuest()
    {
        return $this->_guest;
    }

    /**
     * @return string
     */
    public function getTime()
    {
        return $this->_time;
    }

    /**
     * @return string
     */
    public function getData()
    {
        return $this->_data;
    }

    /**
     * @return string
     */
    public function getUserId()
    {
        return $this->_userId;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->_username;
    }
}