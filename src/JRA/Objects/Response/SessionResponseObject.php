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
     * SessionResponseObject constructor.
     *
     * @param string $pResponse The response of the request.
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
     * Returns all session object of the response.
     *
     * @return SessionObject[]
     */
    public function getSessions()
    {
        return $this->_sessions;
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