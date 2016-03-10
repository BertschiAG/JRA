<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: UserLogoutResponseObject.php
 * Date: 20.01.2016
 * Time: 16:34
 */

namespace JRA\Objects\Response;


class UserLogoutResponseObject
{

    /**
     * @var string
     */
    private $_msg;

    /**
     * @var string
     */
    private $_jResponse;

    /**
     * @var string
     */
    private $_error;

    /**
     * @var string
     */
    private $_status;

    /**
     * UserLogoutResponseObject constructor.
     *
     * @param string $pResponse
     */
    public function __construct($pResponse)
    {
        $object = json_decode($pResponse);
        $this->_msg = $object->msg;
        $this->_jResponse = $object->jresponse;
        $this->_error = $object->error;
        $this->_status = $object->status;
    }

    /**
     * @return string
     */
    public function getMsg()
    {
        return $this->_msg;
    }

    /**
     * @return string
     */
    public function getJResponse()
    {
        return $this->_jResponse;
    }

    /**
     * @return string
     */
    public function getError()
    {
        return $this->_error;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->_status;
    }
}