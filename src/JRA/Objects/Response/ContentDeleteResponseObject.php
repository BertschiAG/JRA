<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: ContentDeleteResponseObject.php
 * Date: 25.01.2016
 * Time: 13:20
 */

namespace JRA\Objects\Response;


class ContentDeleteResponseObject
{

    /**
     * @var string
     */
    private $_content;

    /**
     * @var string
     */
    private $_error;

    /**
     * @var string
     */
    private $_status;

    /**
     * CAPIResponseObject constructor.
     *
     * @param string $pResponse
     */
    public function __construct($pResponse)
    {
        $object = json_decode($pResponse);
        $this->_content = $object->content;
        $this->_error = $object->error;
        $this->_status = $object->status;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->_content;
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