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
     * If an error occurred.
     *
     * @var string
     */
    private $_error;

    /**
     * Status of the request.
     *
     * @var string
     */
    private $_status;

    /**
     * UserLogoutResponseObject constructor.
     *
     * @param string $pResponse The response of the request.
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
     * Returns the message of the response.
     *
     * @return string
     */
    public function getMsg()
    {
        return $this->_msg;
    }

    /**
     * Return the Joomla Response of the response.
     *
     * @return string
     */
    public function getJResponse()
    {
        return $this->_jResponse;
    }

    /**
     * Returns if an error occurred.
     *
     * @return string
     */
    public function getError()
    {
        return $this->_error;
    }

    /**
     * Returns the status of the request.
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->_status;
    }
}