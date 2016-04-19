<?php
/**
 * Created by PhpStorm.
 * Copyright: Bertschi AG, 2016
 * User: jbaumann
 * File: ContentListResponseObject.php
 * Date: 20.01.2016
 * Time: 16:52
 */

namespace JRA\Objects\Response;


use JRA\Objects\Response\Data\ContentObject;

class ContentListResponseObject
{

    /**
     * @var ContentObject[]
     */
    private $_contents;

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
     * @param string $pResponse The response of the request.
     */
    public function __construct($pResponse)
    {
        $object = json_decode($pResponse);
        foreach ($object as $pKey => $pValue) {
            if ($pKey != 'status' && $pKey != 'error') {
                $this->_contents[] = new ContentObject($pValue);
            }
        }
        $this->_error = $object->error;
        $this->_status = $object->status;
    }

    /**
     * Returns all content objects of the response.
     *
     * @return ContentObject[]
     */
    public function getContents()
    {
        return $this->_contents;
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