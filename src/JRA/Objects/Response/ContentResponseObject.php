<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: ContentResponseObject.php
 * Date: 13.01.2016
 * Time: 11:29
 */

namespace JRA\Objects\Response;


use JRA\Objects\Response\Data\ContentObject;

class ContentResponseObject
{

    /**
     * @var ContentObject
     */
    private $_content;

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
     * ContentListResponseObject constructor.
     *
           * @param string $pResponse The response of the request.     */
    public function __construct($pResponse)
    {
        $object = json_decode($pResponse);
        $this->_content = new ContentObject($object->article);
        $this->_error = $object->error;
        $this->_status = $object->status;
    }

    /**
     * Returns the content of the response.
     *
     * @return ContentObject
     */
    public function getContent()
    {
        return $this->_content;
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