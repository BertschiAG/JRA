<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: SessionResponseObject.php
 * Date: 20.01.2016
 * Time: 15:37
 */

namespace JRA\Objects;


class SessionResponseObject
{
    /**
     * @var SessionObject[]
     */
    private $_msg;

    /**
     * @var string
     */
    private $_error;

    /**
     * @var string
     */
    private $_status;

    public function __construct($pResponse)
    {
        $object = json_decode($pResponse);
        foreach ($object->msg as $pValue) {
            $this->_msg[] = new SessionObject($pValue);
        }
        $this->_error = $object->error;
        $this->_status = $object->status;
    }

    /**
     * @return SessionObject[]
     */
    public function getMsg()
    {
        return $this->_msg;
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