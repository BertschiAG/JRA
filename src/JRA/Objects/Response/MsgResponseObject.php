<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: MsgResponseObject.php
 * Date: 12.01.2016
 * Time: 09:46
 */

namespace JRA\Objects\Response;


class MsgResponseObject
{

    /**
     * @var string
     */
    private $_msg;

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
     * MsgResponseObject constructor.
     *
     * @param string $pResponse The response of the request.
     */
    public function __construct($pResponse)
    {
        $object = json_decode($pResponse);
        $this->_msg = $object->msg;
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