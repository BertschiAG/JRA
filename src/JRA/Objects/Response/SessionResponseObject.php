<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: SessionResponseObject.php
 * Date: 20.01.2016
 * Time: 15:37
 */

namespace JRA\Objects\Response;


use JRA\Objects\Response\Data\SessionObject;

class SessionResponseObject
{
    /**
     * @var SessionObject[]
     */
    private $_sessions;

    /**
     * @var string
     */
    private $_error;

    /**
     * @var string
     */
    private $_status;

    /**
     * SessionResponseObject constructor.
     *
     * @param string $pResponse
     */
    public function __construct($pResponse)
    {
        $object = json_decode($pResponse);
        foreach ($object->msg as $pValue) {
            $this->_sessions[] = new SessionObject($pValue);
        }
        $this->_error = $object->error;
        $this->_status = $object->status;
    }

    /**
     * @return SessionObject[]
     */
    public function getSessions()
    {
        return $this->_sessions;
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